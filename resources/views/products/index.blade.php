<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title','Catalogue')

@section('pageTitle','Notre Catalogue')

@section('content')
    @forelse ($products as $product)
        <x-product-card
        :name="$product->name"
        :price="$product->price"
        />

        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
            Voir le produit
        </a>
    @empty
        <p> No Products ! </p>
    @endforelse
    <br>
    <a href="{{ route('products.create') }}"> Ajouter un nouveau produit </a>
@endsection