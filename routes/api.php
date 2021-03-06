<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/random', [ProductController::class, 'random']);
Route::get('/product/{product}', [ProductController::class, 'show']);
Route::get('/category/', [ProductController::class, 'categories']);
Route::get('/category/{name}', [ProductController::class, 'category']);
