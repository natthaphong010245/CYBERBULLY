<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Main pages
Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/main', function () {
    return view('main');
})->name('main');

Route::get('/login', function () {
    return view('login&register.login');
})->name('login');

Route::get('/register', function () {
    return view('login&register.register');
})->name('register');

Route::get('/main', function () {
    return view('main');
})->name('main');