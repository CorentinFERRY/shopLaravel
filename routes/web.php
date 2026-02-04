<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/hello', function () {
    return "Hello Laravel !";
});

// Routes exercices 1 à 4 (nommés)
Route::get('/', [PageController::class, 'home'])
    ->name('home');                                         // nomme la route 
Route::get('/about', [PageController::class, 'about'])
    ->name('about');
/*
Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show')
    ->where('id','[0-9]+');                                 // Ajoute une condition sur l'id d'être un nombre entier
//  ->whereNumber('id');
*/

// Une ligne = 7 routes !
Route::resource('products', ProductController::class);
// Crée automatiquement :
// GET    /products          → index   → products.index
// GET    /products/create   → create  → products.create
// POST   /products          → store   → products.store
// GET    /products/{id}     → show    → products.show
// GET    /products/{id}/edit → edit   → products.edit
// PUT    /products/{id}     → update  → products.update
// DELETE /products/{id}     → destroy → products.destroy

Route::resource('categories',CategoryController::class);
// Crée automatiquement :
// GET    /categories          → index   → categories.index
// GET    /categories/create   → create  → categories.create
// POST   /categories          → store   → categories.store
// GET    /categories/{id}     → show    → categories.show
// GET    /categories/{id}/edit → edit   → categories.edit
// PUT    /categories/{id}     → update  → categories.update
// DELETE /categories/{id}     → destroy → categories.destroy

// Groupe de routes admin 
// Crée un groupe pour le préfix '/admin' nommé par 'admin.xxxxx'
Route::name('admin.')->prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');                                                  // Ici on aura admin.dashboard 
    Route::get('/listUsers', [AdminController::class, 'listUsers'])
        ->name('listUsers');                                                  // Ici on aura admin.listUsers
});

// Routes Auth
Route::get('/login')->name('login');
Route::get('/register')->name('register');
Route::post('/logout')->name('logout');
Route::get('/profile')->name('profile');



// Puis la route fallback en DERNIER
Route::fallback(function () {
    return 'Page non trouvée ! <a href="/home">Retour à l\'accueil</a>  <meta http-equiv="refresh" content="5;URL=/"> ';
});
