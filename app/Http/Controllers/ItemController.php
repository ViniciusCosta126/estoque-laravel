<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemFormRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::orderBy("name")->get();
        $mensagemSucesso = $request->session()->get("mensagem.sucesso");
        return view("item.index")->with("items", $items)->with("mensagemSucesso", $mensagemSucesso);
    }
    public function create()
    {
        return view('item.create');
    }

    public function store(ItemFormRequest $request)
    {
        $item = Item::create($request->all());
        return to_route('item.index')->with('mensagem.sucesso', "O {$item->name} foi adicionado com sucesso");
    }

    public function edit(Item $item)
    {
        return view("item.edit")->with("item", $item);
    }

    public function update(Item $item, ItemFormRequest $request)
    {
        $item->fill($request->all());
        $item->save();
        return to_route('item.index')->with('mensagem.sucesso', "O {$item->name} foi alterado com sucesso");;
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return to_route("item.index");
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('q');

        $items = Item::where('name', 'like', '%' . $searchTerm . '%')->get();

        return response()->json($items);
    }
}
