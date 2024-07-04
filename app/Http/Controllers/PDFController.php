<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function exportPDFItem()
    {
        $items = Item::all();
        $pdf = PDF::loadView('pdf.index', compact("items"));

        return $pdf->setPaper('A4', "landscape")->download("items.pdf");
    }

    public function exportPDFOrder($id)
    {

        $order = Order::with('items')->findOrFail($id);
        $pdf = PDF::loadView('pdf.order', compact("order"));
        return $pdf->setPaper('A4', "landscape")->download("order.pdf");
    }
    public function exportPDFOrders()
    {

        $orders = Order::with('items')->get();
        $pdf = PDF::loadView('pdf.all-orders', compact("orders"));
        return $pdf->setPaper('A4', "landscape")->download("orders.pdf");
    }
}
