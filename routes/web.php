<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get("/teste/{username}", function (string $username) {
    return 'twitch/' . $username;
});
