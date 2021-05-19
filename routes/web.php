<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;


require __DIR__.'/auth.php';

Route::get('/', [ShopController::class, 'home']);


Route::get('/product/{slug}', [ShopController::class, 'show']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

