<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title','Catalogue')

@section('pageTitle','Notre Catalogue')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 mb-0">Produits</h2>
        <a href="{{ route('products.create') }}" class="btn btn-success">Ajouter un nouveau produit</a>
    </div>

    @if($products->isEmpty())
        <div class="alert alert-info">Aucun produit pour le moment.</div>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <x-product-card :name="$product->name" :price="$product->price" :category="$product->category->name"/>
                    <div class="mt-2 d-flex justify-content-between">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">Voir</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-secondary btn-sm">Modifier</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection