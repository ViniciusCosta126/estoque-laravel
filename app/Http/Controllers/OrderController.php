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
    public function store(OrderFormRequest $request)
    {
        $order = Order::create($request->all());

        foreach ($request->items as $item) {
            $item['quantity'] = (int) $item['quantity'];
            $item['price'] = (float) $item['price'];

            $product = Item::find($item['item_id']);
            if (!$product || ($product->amount - $item['quantity'] < 0)) {
                return redirect()->back()
                    ->withErrors(['item_id' => 'Quantidade insuficiente para o produto: ' . $product->name])
                    ->withInput();
            }

            ItemController::atualizaQuantidadeItem($item['item_id'], $item['quantity']);
            $order->items()->attach($item['item_id'], ['quantity' => $item['quantity'], 'price' => $item['price']]);
        };
        return to_route('order.index')->with('mensagem.sucesso', 'Pedido criado com sucesso.');
    }
    public function edit(Order $order)
    {
        $newOrder = Order::with('items')->findOrFail($order->id);
        return view("order.edit")->with("order", $newOrder);
    }

    public function update(Order $order, OrderFormRequest $request)
    {
        $order->fill($request->all());
        $order->save();
        return to_route("order.index")->with('mensagem.sucesso', "Pedido atualizado com sucesso!");
    }

    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('order.show')->with('order', $order);
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return to_route("order.index")->with("mensagem.sucesso", "Pedido excluido com sucesso!");
    }
}
