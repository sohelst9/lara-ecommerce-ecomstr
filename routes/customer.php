<?php

use App\Http\Controllers\Customer\CustomerDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('customer-dashboard', [CustomerDashboardController::class, 'customer_dashboard'])->name('customer.dashboard');
});
