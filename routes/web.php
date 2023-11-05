<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OtherController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about-us', [OtherController::class, 'about_us'])->name('about.us');
Route::get('/contact-us', [OtherController::class, 'contact_us'])->name('contact.us');
Route::get('/faq', [OtherController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [OtherController::class, 'privacy_policy'])->name('privacy.policy');
Route::get('/term-condition', [OtherController::class, 'term_condition'])->name('term.condition');
require __DIR__.'/product.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
