<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'all_product'])->name('all.product');
Route::get('/search/products', [ProductController::class, 'search'])->name('search.product');
Route::get('/category/{slug}', [ProductController::class, 'category_based_product'])->name('category.product.show');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
// Route::middleware(['auth'])->group(function () {
// });