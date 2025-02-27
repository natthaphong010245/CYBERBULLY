<?php

use App\Http\Controllers\TodoController;

Route::resource('todos', TodoController::class);
Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/main', function () {
    return view('main');
});