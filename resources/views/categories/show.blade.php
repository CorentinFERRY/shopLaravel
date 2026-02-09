<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title','Categories')

@section('pageTitle',$category->name)

@section('content')
    <p> {{ $category->description ?? ""}}</p>
    <div class="row">
    @forelse ($category->products as $product)
    <div class="col-md-4 mb-4">
        <x-product-card :product="$product"/>
        <div class="mt-2 d-flex justify-content-between">
            <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm">Voir</a>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-secondary btn-sm">Modifier</a>
        </div>
    </div>
    @empty
        <p> No Products ! </p>
    @endforelse
    </div>
@endsection