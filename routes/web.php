<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckRoleUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/main', function () {
    return view('main');
})->name('main');

Route::get('/main_video', function () {
    return view('main_video');
})->name('main_video');

Route::get('/main_info', function () {
    return view('main_info');
})->name('main_info');

Route::get('/video_category1_select_language', function () {
    return view('video_category1/video_category1_select_language');
})->name('video_category1_select_language');

Route::get('/video_category1_select_language1', function () {
    return view('video_category1/video_category1_select_language1');
})->name('video_category1_select_language1');

Route::get('/video_category1_select_language2', function () {
    return view('video_category1/video_category1_select_language2');
})->name('video_category1_select_language2');

Route::get('/video_category1_select_language3', function () {
    return view('video_category1/video_category1_select_language3');
})->name('video_category1_select_language3');

Route::get('/video_category1_select_language4', function () {
    return view('video_category1/video_category1_select_language4');
})->name('video_category1_select_language4');

Route::get('/video_category1_select_language5', function () {
    return view('video_category1/video_category1_select_language5');
})->name('video_category1_select_language5');

Route::get('/video_category1_select_language6', function () {
    return view('video_category1/video_category1_select_language6');
})->name('video_category1_select_language6');

Route::get('/video_category1_select_language7', function () {
    return view('video_category1/video_category1_select_language7');
})->name('video_category1_select_language7');

Route::get('/video_category2_select_language', function () {
    return view('video_category2/video_category2_select_language');
})->name('video_category2_select_language');

Route::get('/video_category2_select_language1', function () {
    return view('video_category2/video_category2_select_language1');
})->name('video_category2_select_language1');

Route::get('/video_category2_select_language2', function () {
    return view('video_category2/video_category2_select_language2');
})->name('video_category2_select_language2');

Route::get('/video_category2_select_language3', function () {
    return view('video_category2/video_category2_select_language3');
})->name('video_category2_select_language3');

Route::get('/video_category2_select_language4', function () {
    return view('video_category2/video_category2_select_language4');
})->name('video_category2_select_language4');

Route::get('/video_category2_select_language5', function () {
    return view('video_category2/video_category2_select_language5');
})->name('video_category2_select_language5');

Route::get('/video_category2_select_language6', function () {
    return view('video_category2/video_category2_select_language6');
})->name('video_category2_select_language6');

Route::get('/video_category2_select_language7', function () {
    return view('video_category2/video_category2_select_language7');
})->name('video_category2_select_language7');

Route::get('/video_category3_select_language', function () {
    return view('video_category3/video_category3_select_language');
})->name('video_category3_select_language');

Route::get('/video_category3_select_language1', function () {
    return view('video_category3/video_category3_select_language1');
})->name('video_category3_select_language1');

Route::get('/video_category3_select_language2', function () {
    return view('video_category3/video_category3_select_language2');
})->name('video_category3_select_language2');

Route::get('/video_category3_select_language3', function () {
    return view('video_category3/video_category3_select_language3');
})->name('video_category3_select_language3');

Route::get('/video_category3_select_language4', function () {
    return view('video_category3/video_category3_select_language4');
})->name('video_category3_select_language4');

Route::get('/video_category3_select_language5', function () {
    return view('video_category3/video_category3_select_language5');
})->name('video_category3_select_language5');

Route::get('/video_category3_select_language6', function () {
    return view('video_category3/video_category3_select_language6');
})->name('video_category3_select_language6');

Route::get('/video_category3_select_language7', function () {
    return view('video_category3/video_category3_select_language7');
})->name('video_category3_select_language7');

Route::get('/video_category4_select_language', function () {
    return view('video_category4/video_category4_select_language');
})->name('video_category4_select_language');

Route::get('/video_category4_select_language1', function () {
    return view('video_category4/video_category4_select_language1');
})->name('video_category4_select_language1');

Route::get('/video_category4_select_language2', function () {
    return view('video_category4/video_category4_select_language2');
})->name('video_category4_select_language2');

Route::get('/video_category4_select_language3', function () {
    return view('video_category4/video_category4_select_language3');
})->name('video_category4_select_language3');

Route::get('/video_category4_select_language4', function () {
    return view('video_category4/video_category4_select_language4');
})->name('video_category4_select_language4');

Route::get('/video_category4_select_language5', function () {
    return view('video_category4/video_category4_select_language5');
})->name('video_category4_select_language5');

Route::get('/video_category4_select_language6', function () {
    return view('video_category4/video_category4_select_language6');
})->name('video_category4_select_language6');

Route::get('/video_category4_select_language7', function () {
    return view('video_category4/video_category4_select_language7');
})->name('video_category4_select_language7');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Protected Routes
Route::middleware(['auth', CheckRoleUser::class])->group(function () {
    Route::get('/test_login', [MainController::class, 'testLogin'])->name('test_login');
});