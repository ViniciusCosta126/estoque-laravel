<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id')->get();
        return view('order.index')->with('orders', $orders);
    }

    public function create()
    {
        $items = Item::all();
        return view('order.create')->with("items", $items);
    }
}
