<?php

namespace App\Http\Controllers;

use App\View\Components\ProductCard;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = [
            ['id' => 0,'name' => 'T-shirt Laravel','price' => 19.99,],
            ['id' => 1,'name' => 'Mug Développeur','price' => 12.50,],
            ['id' => 2,'name' => 'Sticker PHP','price' => 3.99,],
            ['id' => 3,'name' => 'Clavier mécanique RGB','price' => 89.90,],
            ['id' => 4,'name' => 'Casque Gaming','price' => 59.00,]
        ];

        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $products = [
            ['id' => 0,'name' => 'T-shirt Laravel','price' => 19.99,],
            ['id' => 1,'name' => 'Mug Développeur','price' => 12.50,],
            ['id' => 2,'name' => 'Sticker PHP','price' => 3.99,],
            ['id' => 3,'name' => 'Clavier mécanique RGB','price' => 89.90,],
            ['id' => 4,'name' => 'Casque Gaming','price' => 59.00,]
        ];
        return view('products.product',['product' => $products[$id]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
