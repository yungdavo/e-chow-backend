<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/popular', [ProductController::class, 'getPopular']);
Route::get('/products/recommended', [ProductController::class, 'getRecommended']);
//Route::get('/products/drinks', [ProductController::class, 'getDrinks']);

Route::get('/categories/{id}/products', [ProductController::class, 'getByCategory']);

//Sign Up and Sign

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);