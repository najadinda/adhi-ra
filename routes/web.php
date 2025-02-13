<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('pages.home.index');
});

// Route::get('/register', function () {
//     return view('pages.register');
// });

// Route::get('/login', function () {
//     return view('pages.login');
// });

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'regist')->name('regist');
    Route::post('/register', 'dataRegist')->name('register');

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('auth');

    Route::get('/logout', 'logout')->middleware('auth')->name('logout');
});

// Route::middleware('auth')->group(function() {
//     Route::get('/', function () {
//         return view('pages.home.index');
//     });
// });