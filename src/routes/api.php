<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/me', [UserController::class, 'me'])->name('me');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:sanctum', 'has_privilege'])->group(function () {
    Route::get('orders/{id}', [OrderController::class, 'index'])->name('getOrders');
    Route::delete('orders/{id}', [OrderController::class, 'destroy'])->name('deleteOrders');
    Route::post('orders', [OrderController::class, 'store'])->name('postOrders');
    Route::patch('orders/{id}', [OrderController::class, 'update'])->name('patchOrders');
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('assign_role', [RolesController::class, 'setRole'])->name('assignRole');
    Route::get('roles', [RolesController::class, 'index'])->name('getRoles');
});
