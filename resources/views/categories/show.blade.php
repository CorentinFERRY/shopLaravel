<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title','Categories')

@section('pageTitle',$category->name)

@section('content')
    <p> {{ $category->description ?? ""}}</p>
    <div class="row">
    @forelse ($category->products as $product)
    <div class="col-md-4 mb-4">
        <div class="d-flex flex-column h-100">
            <x-product-card :product="$product"/>
            <div class="mt-2 d-flex gap-2 flex-grow-1 align-items-end">
                <x-button href="{{ route('products.show', $product) }}" class="btn-sm flex-grow-1">Voir</x-button>
                <x-button href="{{ route('products.edit', $product) }}" color="outline-secondary" class="btn-sm flex-grow-1">Modifier</x-button>
            </div>
        </div>
    </div>
    @empty
        <p> No Products ! </p>
    @endforelse
    </div>
@endsection