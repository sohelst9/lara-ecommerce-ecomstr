<?php

use App\Http\Controllers\Frontend\AuthenticationController;
use App\Http\Controllers\Frontend\OthersController;
use App\Http\Controllers\Frontend\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    //---all users
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/edit/{id}', [UsersController::class, 'edit']);
    Route::put('/users/update/{id}', [UsersController::class, 'update']);
    Route::delete('/users/delete/{id}', [UsersController::class, 'delete']);

    //---user profile
    Route::get('/user', [UsersController::class, 'user']);
    Route::put('/user/update', [UsersController::class, 'auth_user_update']);
    Route::patch('/user/change-password', [UsersController::class, 'change_password']);
});

Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::get('/login', [AuthenticationController::class, 'login_view'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login.store');

///check table existing database -----
Route::get('/check-table', [OthersController::class, 'check_table'])->name('check_table');
