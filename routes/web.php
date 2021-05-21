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
    Route::put('/setting', [AdminController::class, 'updateSetting'])->name('dashboard.setting');

    Route::get('/setting/akun', [AdminController::class, 'settingAkun'])->name('dashboard.setting.akun');
    Route::put('/setting/akun', [AdminController::class, 'updateSettingAkun'])->name('dashboard.setting.akun');

    Route::get('/add/product', [AdminController::class, 'addProduct']);
    Route::post('/add/product', [AdminController::class, 'storeProduct']);

    // products
    Route::get('/products', [AdminController::class, 'products'])->name('dashboard.products');
    Route::get('/products/category', [AdminController::class, 'productCategory'])->name('dashboard.products.category');
    Route::get('/product/{id}', [AdminController::class, 'editProduct']);
    Route::put('/product/{id}', [AdminController::class, 'updateProduct']);
    Route::delete('/product/{id}', [AdminController::class, 'destroyProduct']);
});
