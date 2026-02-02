<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function (){
    return "Hello Laravel !";
});

// Routes exercices 1 à 4 (nommés)
Route::get('/home', [PageController::class ,'home'])->name('home'); // Renvois vers le produit 42
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/products/{id}',[ProductController::class,'show'])->name('products.show');