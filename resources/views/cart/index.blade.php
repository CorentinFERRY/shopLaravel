<!-- resources/views/cart/index.blade.php -->
@extends('layouts.app')

@section('title','Panier')

@section('pageTitle','Votre Panier')

@section('content')
    @if(empty($products))
        <div class="alert alert-info">Aucun produit pour le moment.</div>
    @else
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <x-item-cart :product="$product"/>
            </div>
        @endforeach
    </div>
    <p> Total : <strong>{{number_format($totalCart, 2)}} € </strong></p>
    @endif
     <div class="d-flex justify-content-between">
        <x-button href="{{ route('products.index') }}" color="success">Retour au catalogue</x-button>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <x-button type="submit" color="info">Passer commande</x-button>        
        </form>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button type="submit" color="danger">Vider le panier</x-button>        
        </form>
     </div>
@endsection