<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home():string
    {
        return redirect()->route('products.show',['id' => 42]);
    }

    public function about():string
    {
        return "Notre boutique vous propose un maximum de produits de qualités pour un prix mini !";
    }
}
