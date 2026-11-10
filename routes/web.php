<?php

use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\{
    UserController,
    AuthController,
    ProfileController
};
use App\Http\Controllers\Admin\{
    ProductController,
    ProductCategoryController
};

// Auth Routes (Login)
Route::get('/', function () {
    return redirect()->route('getLogin');
});



Route::middleware(['web'])->group(function () {
    Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('getLogin');
    Route::post('/admin/login', [AuthController::class, 'postLogin'])->name('postLogin');
});

// Protected Admin Routes
Route::prefix('admin')
    ->middleware(['web', 'auth', 'prevent-back-history']) // 'web' must be first
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');

        Route::resource('products', ProductController::class);
        Route::resource('productCategories', ProductCategoryController::class);
        Route::post('productCategories/reorder', [ProductCategoryController::class, 'reorder'])->name('productCategories.reorder');
    });