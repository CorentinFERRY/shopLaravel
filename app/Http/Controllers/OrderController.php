<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only('destroy'); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->is_admin) {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', Auth::id())->get();
        }
        return view('orders.index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // On récupère le panier en session
        $cart = session()->get('cart', []);

        // On vérifie que le panier n'est pas vide & Si vide on redirige avec un message d'erreur 
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        // Un seule requete SQL pour récuperer les produits en BDD ('id', array_keys($cart) recupère ici l'id des produits )
        $products = Product::whereIn('id', array_keys($cart))->get();

        // Boucle pour calculer le total du panier 
        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cart[$product->id]['quantity'];
        }

        // Utilisation de DB::transaction qui permet en cas d'erreur de tout annuler automatiquement et éviter de faire une entrée de BDD incomplète
        DB::transaction(function () use ($products, $cart, $total) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'status' =>'pending'
            ]);

            foreach ($products as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $cart[$product->id]['quantity'],
                    'unit_price' => $product->price,
                ]);
            }
        });

        // On vide le panier après le passage de la commande
        session()->forget('cart');

        // On redirige sur les commandes avec message de succes !
        return redirect()->route('orders.index')->with('success', 'Commande passée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->with('orderItems.product')->get();
        return view('orders.show',compact('order'));
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        DB::transaction(function () use ($order) {
            $order->orderItems()->delete();
            $order->delete();
        });
        return redirect()->route('orders.index')->with('success', 'Commande supprimée avec succès !');
    }
}

