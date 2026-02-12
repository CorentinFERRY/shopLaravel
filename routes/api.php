<?php
// routes/api.php

//Routes API

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

/*
 // GET /api/products
Route::get('/products', [ProductController::class, 'index']);
// GET /api/products/1
Route::get('/products/{product}', [ProductController::class, 'show']);
// POST /api/products
Route::post('/products', [ProductController::class, 'store']);
// PUT /api/products/1
Route::put('/products/{product}', [ProductController::class, 'update']);
// DELETE /api/products/1
Route::delete('/products/{product}', [ProductController::class, 'destroy']); 
 */

Route::name('api.')->group(function(){
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class,'register'])->name('register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [AuthController::class, 'user'])->name('user');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::apiResource('products', ProductController::class)
        ->except(['index','show']);
    });

    Route::apiResource('products', ProductController::class)
    ->only(['index','show']);
     
});

