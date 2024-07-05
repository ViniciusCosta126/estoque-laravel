<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PDFController;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\FastExcel\FastExcel;

Route::get('/', function () {
    return redirect('/login');
});
Auth::routes();

Route::resource("/item", ItemController::class)->except(['show'])->middleware('auth');
Route::resource('order', OrderController::class)->middleware('auth');

Route::get('/items/search', [ItemController::class, 'search'])->middleware('auth');
Route::get('/items/search/{param}', [ItemController::class, 'obterDados'])->middleware('auth');

Route::get('item/downloads', function () {
    return (new FastExcel(Item::all()))->download('items.xlsx');
})->name("download")->middleware('auth');

Route::get('order/orders/downloads', function () {
    return (new FastExcel(Order::all()))->download('orders.xlsx');
})->name("download-order")->middleware('auth');

Route::get('/export-pdf', [PDFController::class, 'exportPDFItem'])->name("download-pdf-item")->middleware('auth');
Route::get('/export-pdf-order/{id}', [PDFController::class, 'exportPDFOrder'])->name("download-pdf-order")->middleware('auth');
Route::get('/export-pdf-orders', [PDFController::class, 'exportPDFOrders'])->name("download-pdf-orders")->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
