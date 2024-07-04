<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PDFController;
use App\Models\Item;
use App\Models\Order;
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

Route::get('order/orders/downloads', function () {
    return (new FastExcel(Order::all()))->download('orders.xlsx');
})->name("download-order");

Route::get('/export-pdf', [PDFController::class, 'exportPDFItem'])->name("download-pdf-item");
Route::get('/export-pdf-order/{id}', [PDFController::class, 'exportPDFOrder'])->name("download-pdf-order");
Route::get('/export-pdf-orders', [PDFController::class, 'exportPDFOrders'])->name("download-pdf-orders");
