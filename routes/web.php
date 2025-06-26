<?php

use Illuminate\Support\Facades\Route;

use App\Admin\Controllers\
{   UserController,
    AuthController,
    ProfileController,
    ProductController
};
use App\Http\Controllers\Api\ProductApiController;


use App\Http\Controllers\Admin\{
    FoodController,
    FoodCategoryController
};


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login',
[AuthController::class,'getLogin'])->name('getLogin');

Route::post('/admin/login',
[AuthController::class,'postLogin'])->name('postLogin');

Route::prefix('admin')
    ->middleware(['auth', 'prevent-back-history'])
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');

    Route::resource('foods', FoodController::class);
    Route::resource('foodCategories', FoodCategoryController::class);
    Route::post('foodCategories/reorder', [FoodCategoryController::class, 'reorder'])->name('foodCategories.reorder');
});

