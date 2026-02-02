<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title','Catalogue')

@section('content')
    @forelse ($products as $product)
        <p> {{ $product['name']}} </p>
        <p> {{ $product['price']}} </p>
        <a href="/products/{{ $product['id'] }}"> Voir </a>
    @empty
        <p> No Products ! </p>
    @endforelse
@endsection