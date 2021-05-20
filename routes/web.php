<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;


require __DIR__.'/auth.php';

Route::get('/', [ShopController::class, 'home']);


Route::get('/product/{slug}', [ShopController::class, 'show']);



Route::prefix('dashboard')->middleware('auth')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/setting', [AdminController::class, 'setting'])->name('dashboard.setting');

    // products
    Route::get('/products', [AdminController::class, 'products'])->name('dashboard.products');
    Route::get('/product/{id}', [AdminController::class, 'editProduct']);
    Route::put('/product/{id}', [AdminController::class, 'updateProduct']);
    Route::delete('/product/{id}', [AdminController::class, 'destroyProduct']);
});
