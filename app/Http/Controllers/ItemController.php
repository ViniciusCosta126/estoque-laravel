<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemFormRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy("name")->get();
        return view("item.index")->with("items", $items);
    }
    public function create()
    {
        return view('item.create');
    }

    public function store(ItemFormRequest $request)
    {
        $item = Item::create($request->all());
        return to_route('item.index');
    }

    public function edit(Item $item)
    {
        return view("item.edit")->with("item", $item);
    }

    public function update(Item $item, ItemFormRequest $request)
    {
        $item->fill($request->all());
        $item->save();
        return to_route('item.index');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return to_route("item.index");
    }
}
