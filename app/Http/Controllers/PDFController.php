<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function exportPDF()
    {
        $items = Item::all();
        $pdf = PDF::loadView('pdf.index', compact("items"));

        return $pdf->setPaper('A4', "landscape")->download("items.pdf");
    }
}
