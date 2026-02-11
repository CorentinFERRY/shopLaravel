<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home():View
    {
        $nbrItems = Product::count();
        
        $data = [
            'nbrItems' => $nbrItems,
            'state' => true
        ];
        // return view('index',['data' => $data]);
        return view('index',compact('data'));
    }

    public function about():string
    {
        return "Notre boutique vous propose un maximum de produits de qualités pour un prix mini !";
    }
}
