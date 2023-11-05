<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LoginRegisterController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductVariationController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [LoginRegisterController::class, 'login'])->name('admin.login');
Route::post('admin/login', [LoginRegisterController::class, 'login_store'])->name('admin.login.store');
Route::get('admin/register', [LoginRegisterController::class, 'register'])->name('admin.register');
Route::post('admin/register', [LoginRegisterController::class, 'register_store'])->name('admin.register.store');
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');
    //---my profile--
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('/profile/{id}', [ProfileController::class, 'change'])->name('admin.profile.change');
    Route::get('/change_password', [ProfileController::class, 'change_password'])->name('admin.change_password');
    Route::post('/change_password/{id}', [ProfileController::class, 'change_password_update'])->name('admin.password.update');
    //---my profile end--
    //---resource route //---mixed product related route-------
    Route::resource('/color', ColorController::class);
    Route::resource('/size', SizeController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::delete('/gallery_image/{id}', [ProductController::class, 'gallery_image_delete']);
    Route::resource('/product-variation', ProductVariationController::class);
    Route::resource('/staff', StaffController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    //---resource route //---mixed product related route end-------
     //----customer routes-----
     Route::get('/customer', [CustomerController::class, 'index'])->name('admin.customer');
     //--sale routes-----
     Route::get('/orders', [OrderController::class, 'orders'])->name('admin.orders');
});