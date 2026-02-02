<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello Laravel !";
});

// Routes exercices 1 à 4 (nommés)
Route::get('/home', [PageController::class, 'home'])
    ->name('home'); // nomme la route 
Route::get('/about', [PageController::class, 'about'])
    ->name('about');
Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show')
    ->where('id','[0-9]+');         // Ajoute une condition sur l'id d'être un nombre entier
//  ->whereNumber('id');

// Groupe de routes admin 
// Crée un groupe pour le préfix '/admin' nommé par 'admin.xxxxx'
Route::name('admin.')->prefix('/admin')->group(function () {            
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');                                                  // Ici on aura admin.dashboard 
    Route::get('/listUsers', [AdminController::class, 'listUsers'])
        ->name('listUsers');                                                  // Ici on aura admin.listUsers
});
