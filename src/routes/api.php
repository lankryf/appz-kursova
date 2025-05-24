<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [UserController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('orders/{id}', [OrderController::class, 'index']);
    Route::delete('orders/{id}', [OrderController::class, 'destroy']);
    Route::post('orders', [OrderController::class, 'store']);
    Route::patch('orders/{id}', [OrderController::class, 'update']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('assign_role', [RolesController::class, 'setRole']);
    Route::get('roles', [RolesController::class, 'index']);
});
