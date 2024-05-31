<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('product')->middleware('auth:api')->group(function() {
    Route::post('', [ProductController::class, 'store']);
    Route::get('', [ProductController::class, 'index']);
    Route::get('/price-list', [ProductController::class, 'getPriceList']);
    Route::get('/{id}', [ProductController::class, 'getById']);
    Route::get('/category/{categoryId}', [ProductController::class, 'getByCategory']);
    Route::get('/price/{price}', [ProductController::class, 'getByPrice']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

Route::prefix('category')->middleware('auth:api')->group(function() {
    Route::post('', [CategoryController::class, 'store']);
    Route::get('', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'getById']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::prefix('user')->middleware('auth:api')->group(function() {
    Route::post('', [UserController::class, 'store']);
    Route::get('', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'getById']);
});

Route::prefix('auth')->group(function () {
    Route::post('', [AuthController::class, 'login']);
});
