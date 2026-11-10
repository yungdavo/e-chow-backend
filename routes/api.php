<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AuthController,
    ProductController,
    CustomerController
};

// Public routes
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/popular', [ProductController::class, 'getPopular']);
Route::get('/products/recommended', [ProductController::class, 'getRecommended']);
Route::get('/categories/{id}/products', [ProductController::class, 'getByCategory']);


Route::get('/customer/info', [CustomerController::class, 'info']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', [ProductController::class, 'store']);  
    Route::post('/auth/logout', [AuthController::class, 'logout']);  
});