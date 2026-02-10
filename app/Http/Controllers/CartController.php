<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $products = [];
        $totalCart = 0;
        foreach ($cart as $productId => $details) {
            $product = Product::find($productId);
            if (!$product) {
                continue;
            }
            $product->quantity = $details['quantity'] ?? 1;
            $product->totalPrice = $product->price * $product->quantity;
            $totalCart += $product->totalPrice;
            $products[] = $product;
        }
        return view('cart.index', compact('products','totalCart'));
    }

    public function add(StoreCartRequest $request)
    {
        $request->validated();
        $cart = session()->get('cart', []);
        $productId = $request->product_id;
        $quantity = $request->quantity;
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = ['quantity' => $quantity];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index')
             ->with('success', 'Produit ajouté au panier avec succès !');
    }
   

    public function update(StoreCartRequest $request, Product $product)
    {
        
        $request->validated();
        // Récupérer le panier depuis la session
        $cart = session()->get('cart', []);
        // Vérifier si le produit existe dans le panier
        if (isset($cart[$product->id])) {
            // Mettre à jour la quantité du produit
            $cart[$product->id]['quantity'] = $request->input('quantity', $cart[$product->id]['quantity']);
            if ($cart[$product->id]['quantity'] == 0) {
                // Supprimer le produit du panier
                unset($cart[$product->id]);
            }
            // Enregistrer le panier mis à jour dans la session
            session()->put('cart', $cart);
            return redirect()->route('cart.index')
                   ->with('success', 'Quantité mise à jour avec succès !');
        } else {
            return redirect()->route('cart.index')
                   ->with('error', 'Produit non trouvé dans le panier !');
        }

    }

    public function remove(Product $product)
    {
        // Récupérer le panier depuis la session
        $cart = session()->get('cart', []);
        // Vérifier si le produit existe dans le panier
        if (isset($cart[$product->id])) {
            // Supprimer le produit du panier
            unset($cart[$product->id]);
            // Enregistrer le panier mis à jour dans la session
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Produit supprimé du panier avec succès !');
        } else {
            return redirect()->route('cart.index')->with('error', 'Produit non trouvé dans le panier !');
        }
    }

    public function clear()
    {
        // Supprimer le panier de la session
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Panier vidé avec succès !');
        
    }
}
