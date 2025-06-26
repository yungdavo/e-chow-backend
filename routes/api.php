<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;

Route::prefix('v1')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('popular', [ProductController::class, 'get_popular_products']);
        Route::get('recommended', [ProductController::class, 'get_recommended_products']);
    });
});




