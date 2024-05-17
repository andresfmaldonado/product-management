<?php

use App\Http\Controllers\ProductController;
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

Route::group(function() {
    Route::prefix('product')->group(function() {
        Route::post('', [ProductController::class, 'store']);
        Route::get('', [ProductController::class, 'getAll']);
        Route::get('/{id}', [ProductController::class, 'getById']);
        Route::post('/category', [ProductController::class, 'getByCategory']);
        Route::post('/price', [ProductController::class, 'getByPrice']);
        Route::put('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
    })
})
