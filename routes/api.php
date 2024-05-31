<?php

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

Route::prefix('product')->group(function() {
    Route::post('', [ProductController::class, 'store']);
    Route::get('', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'getById']);
    Route::post('/category', [ProductController::class, 'getByCategory']);
    Route::post('/price', [ProductController::class, 'getByPrice']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

Route::prefix('category')->group(function() {
    Route::post('', [CategoryController::class, 'store']);
    Route::get('', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'getById']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::prefix('user')->group(function() {
    Route::post('', [UserController::class, 'store']);
    Route::get('', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'getById']);
})
