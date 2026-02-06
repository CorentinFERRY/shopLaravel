<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\View\Components\ProductCard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Prompts\Concerns\Fallback;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id'); // Recupère seulement le nom et l'id des catégories.
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'numeric',
            
            'category_id' => 'required|exists:categories,id'
        ]);
        $validated['slug'] = Str::slug($validated['name']);
        $validated['description'] = $request->input('description',null);
        Product::create($validated);
        return redirect()->route('products.index')
               ->with('success', 'Produit créé avec succès !');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',['product' => $product]);  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id'); // Recupère seulement le nom et l'id des catégories.
        return view('products.edit', compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'numeric',
            'image' => 'url|nullable',
            'description' => 'string|nullable',
            'category_id' => 'required|exists:categories,id',
            'active' => 'boolean'
        ]);
        $validated['slug'] = Str::slug($validated['name']);
        $product->update($validated);
        return redirect()->route('products.index')
               ->with('success', 'Produit modifié avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')
            ->with('success', 'Produit supprimé avec succès !');
    }
}
