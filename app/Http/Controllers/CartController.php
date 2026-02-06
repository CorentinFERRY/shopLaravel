<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        $cart = session()->get('cart', []);
        $productId = $request->product_id;
        $quantity = $request->quantity;
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = ['quantity' => $quantity];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produuit ajouté au panier avec succès !');
    }
   

    public function update(string $id)
    {
        //Fonction update pour modifier la quantité d'un produit dans le panier
        // Récupérer le panier depuis la session
        $cart = session()->get('cart', []);
        // Vérifier si le produit existe dans le panier
        if (isset($cart[$id])) {
            // Mettre à jour la quantité du produit
            $cart[$id]['quantity'] = request()->input('quantity', $cart[$id]['quantity']);
            // Enregistrer le panier mis à jour dans la session
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Quantité mise à jour avec succès !');
        } else {
            return redirect()->route('cart.index')->with('error', 'Produit non trouvé dans le panier !');
        }   

    }

    public function remove(string $id)
    {
        //Fonction remove pour supprimer un produit du panier
        // Récupérer le panier depuis la session
        $cart = session()->get('cart', []);
        // Vérifier si le produit existe dans le panier
        if (isset($cart[$id])) {
            // Supprimer le produit du panier
            unset($cart[$id]);
            // Enregistrer le panier mis à jour dans la session
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Produit supprimé du panier avec succès !');
        } else {
            return redirect()->route('cart.index')->with('error', 'Produit non trouvé dans le panier !');
        }
    }

    public function clear()
    {
        //Fonction clear pour vider le panier
        // Supprimer le panier de la session
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Panier vidé avec succès !');
        
    }
}
