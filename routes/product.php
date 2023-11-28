<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\SingleProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'all_product'])->name('all.product');
Route::get('/product/{slug}', [SingleProductController::class, 'single_product'])->name('single.product');
//---size color and get quantity with ajax call--
Route::post('/get-sizes-by-color', [SingleProductController::class, 'get_size']);
Route::post('/get-quantity', [SingleProductController::class, 'get_quantity']);
//---size color and get quantity with ajax call--
Route::get('/search/products', [ProductController::class, 'search'])->name('search.product');
Route::get('/category/{slug}', [ProductController::class, 'category_based_product'])->name('category.product.show');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/{coupon_code}', [CartController::class, 'index']);
Route::get('/cart/remove/{item}', [CartController::class, 'remove_cart']);
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
// Route::middleware(['auth'])->group(function () {
// });