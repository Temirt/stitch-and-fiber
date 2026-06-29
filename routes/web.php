<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\ContactController;

// Pages & Catalog Routes
Route::get('/', [ProductController::class, 'home']);
Route::get('/shop', [ProductController::class, 'index']);
Route::get('/shop/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::view('/story', 'story');
Route::view('/gallery', 'gallery');

// Cart Routes
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'add']);
Route::post('/cart/update', [CartController::class, 'update']);
Route::post('/cart/remove', [CartController::class, 'remove']);

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store']);
Route::get('/checkout/success', [CheckoutController::class, 'success']);

// Maker's Portal Routes
Route::get('/maker-portal', [MakerController::class, 'index']);
Route::post('/maker-portal/increment', [MakerController::class, 'increment']);
Route::post('/maker-portal/decrement', [MakerController::class, 'decrement']);
Route::post('/maker-portal/reset', [MakerController::class, 'reset']);

// Forms Processing
Route::post('/newsletter', [ContactController::class, 'subscribe']);
Route::post('/contact', [ContactController::class, 'inquire']);


