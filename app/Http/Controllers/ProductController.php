<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function show(string $id):string{
        return "Détails du produit n°$id";
    }
}
