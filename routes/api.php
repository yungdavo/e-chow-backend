<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/popular', [ProductController::class, 'getPopular']);
Route::get('/products/recommended', [ProductController::class, 'getRecommended']);

Route::get('/categories/{id}/products', [ProductController::class, 'getByCategory']);