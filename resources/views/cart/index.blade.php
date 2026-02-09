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
        <a href="{{ route('products.index') }}" class="btn btn-success">Retour au catalogue</a>
        <form action="" method="POST">
            @csrf
            <button type="submit" class="btn btn-info" disabled>Valider le panier</button>        
        </form>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Vider le panier</button>        
        </form>
     </div>
@endsection