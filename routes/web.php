<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('pages.home.index');
});

Route::get('/contact', function () {
    return view('pages.contact.index');
})->name('contact');

Route::get('/success', function () {
    return view('pages.transaction.checkout-success');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'regist')->name('regist');
    Route::post('/register', 'dataRegist')->name('register');

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('auth');

    Route::get('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function() {
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.detail');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
    
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});