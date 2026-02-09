<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
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
// GET    /products/{product}     → show    → products.show
// GET    /products/{product}/edit → edit   → products.edit
// PUT    /products/{product}     → update  → products.update
// DELETE /products/{product}     → destroy → products.destroy

Route::resource('categories',CategoryController::class);
// Crée automatiquement :
// GET    /categories          → index   → categories.index
// GET    /categories/create   → create  → categories.create
// POST   /categories          → store   → categories.store
// GET    /categories/{category}     → show    → categories.show
// GET    /categories/{category}/edit → edit   → categories.edit
// PUT    /categories/{category}     → update  → categories.update
// DELETE /categories/{category}     → destroy → categories.destroy

// Groupe de routes admin 
// Crée un groupe pour le préfix '/admin' nommé par 'admin.xxxxx'
Route::name('admin.')->prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');                                                  // Ici on aura admin.dashboard 
    Route::get('/listUsers', [AdminController::class, 'listUsers'])
        ->name('listUsers');                                                  // Ici on aura admin.listUsers
});

//Groupe de routes cart
Route::name('cart.')->prefix('/cart')->group(function () {
    Route::get('/index',[CartController::class,'index'])
        ->name('index');
    Route::post('/add',[CartController::class,'add'])
        ->name('add');
    Route::put('/update/{product}',[CartController::class,'update'])
        ->name('update');
    Route::delete('/remove/{product}',[CartController::class,'remove'])
        ->name('remove');
    Route::delete('/clear',[CartController::class,'clear'])
        ->name('clear');
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
