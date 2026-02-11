<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('title','Catalogue')

@section('pageTitle','Notre Catalogue')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 mb-0">Nos produits</h2>
        <a href="{{ route('products.create') }}" class="btn btn-success">Ajouter un nouveau produit</a>
    </div>

    @if($products->isEmpty())
        <div class="alert alert-info">Aucun produit pour le moment.</div>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="d-flex flex-column h-100">
                        <x-product-card :product="$product"/>
                        <div class="mt-2 d-flex gap-2 flex-grow-1 align-items-end">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm flex-grow-1">Voir</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-secondary btn-sm flex-grow-1">Modifier</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    @endif
@endsection