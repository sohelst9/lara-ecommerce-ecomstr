<?php

use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('customer-dashboard', [CustomerDashboardController::class, 'customer_dashboard'])->name('customer.dashboard');
    //--order
    Route::get('customer-order-track/{trnx_id}', [OrderController::class, 'orderTrack'])->name('order.track');
    Route::get('customer-order', [OrderController::class, 'index'])->name('customer.order.index');
    Route::get('customer-order/invoice/{trnx_id}', [OrderController::class, 'invoice'])->name('customer.order.invoice');
    Route::get('customer-profile', [ProfileController::class, 'index'])->name('customer.profile.index');
    Route::post('customer-profile/{id}', [ProfileController::class, 'update'])->name('customer.profile.update');
    Route::post('customer-password/{id}', [ProfileController::class, 'change_password'])->name('customer.change.password');
});
