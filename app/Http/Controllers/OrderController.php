<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderFormRequest;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $mensagemSucesso = $request->session()->get("mensagem.sucesso");
        $orders = Order::with('items')->orderBy('id')->get();
        return view('order.index')->with('orders', $orders)->with("mensagemSucesso", $mensagemSucesso);;
    }

    public function create()
    {
        $items = Item::all();
        return view('order.create')->with("items", $items);
    }
    public function store(Request $request)
    {
        $order = Order::create($request->all());

        foreach ($request->items as $item) {

            $item['quantity'] = (int) $item['quantity'];
            $item['price'] = (float) $item['price'];
            $order->items()->attach($item['item_id'], ['quantity' => $item['quantity'], 'price' => $item['price']]);
        };
        return to_route('order.index')->with('mensagem.sucesso', 'Order created successfully.');
    }

    public function show($id)
    {

        $order = Order::with('items')->findOrFail($id);
        return view('order.show')->with('order', $order);
    }
}
