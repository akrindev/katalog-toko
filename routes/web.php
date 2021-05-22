<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

require __DIR__.'/auth.php';

Route::get('/', [ShopController::class, 'home']);


Route::get('/product/{slug}', [ShopController::class, 'show']);
Route::get('/category/{name}', [ShopController::class, 'category']);



Route::prefix('dashboard')->middleware('auth')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/setting', [AdminController::class, 'setting'])->name('dashboard.setting');
    Route::put('/setting', [AdminController::class, 'updateSetting'])->name('dashboard.setting');

    Route::get('/setting/akun', [AuthenticatedSessionController::class, 'settingAccount'])->name('dashboard.setting.akun');
    Route::patch('/setting/akun', [AuthenticatedSessionController::class, 'updateSettingAccount'])->name('dashboard.setting.akun');
    Route::patch('/setting/akun/password', [AuthenticatedSessionController::class, 'updatePassword'])->name('dashboard.setting.password');

    Route::get('/add/product', [AdminController::class, 'addProduct'])->name('dashboard.add.product');
    Route::post('/add/product', [AdminController::class, 'storeProduct'])->name('dashboard.add.product');

    // products
    Route::get('/products', [AdminController::class, 'products'])->name('dashboard.products');

    Route::get('/products/category', [AdminController::class, 'productCategory'])->name('dashboard.products.category');
    Route::post('/products/category', [AdminController::class, 'addCategory'])->name('dashboard.products.category.add');
    Route::patch('/products/category/{id}', [AdminController::class, 'updateProductCategory'])->name('dashboard.products.category');
    Route::delete('/products/category/{id}', [AdminController::class, 'deleteProductCategory'])->name('dashboard.products.category');

    Route::get('/product/{id}', [AdminController::class, 'editProduct']);
    Route::put('/product/{id}', [AdminController::class, 'updateProduct']);
    Route::delete('/product/{id}', [AdminController::class, 'destroyProduct']);
});
