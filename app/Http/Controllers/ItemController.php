<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        //dd($request->all());
        $item = Item::create($request->all());
        return to_route('item.index');
    }
}
