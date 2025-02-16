<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('pages.home.index');
});

Route::get('/contact', function () {
    return view('pages.contact.index');
})->name('contact');

Route::get('/products', function () {
    return view('pages.products.index');
})->name('products');

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'regist')->name('regist');
    Route::post('/register', 'dataRegist')->name('register');

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('auth');

    Route::get('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function() {
    Route::get('/cart', function () {
        return view('pages.transaction.cart');
    });

    Route::get('/checkout', function () {
        return view('pages.transaction.checkout');
    });
    
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});