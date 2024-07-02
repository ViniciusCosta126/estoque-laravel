<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PDFController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\FastExcel\FastExcel;

Route::get('/', function () {
    return redirect('/item');
});

Route::resource("/item", ItemController::class)->except(['show']);

Route::resource('order', OrderController::class);
Route::get('/items/search', [ItemController::class, 'search']);
Route::get('/items/search/{param}', [ItemController::class, 'obterDados']);

Route::get('item/downloads', function () {
    return (new FastExcel(Item::all()))->download('items.xlsx');
})->name("download");


Route::get('/export-pdf', [PDFController::class, 'exportPDF'])->name("download-pdf");
