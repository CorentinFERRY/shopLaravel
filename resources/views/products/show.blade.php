<!-- products/product.blade.php -->

@extends('layouts.app')

@section('title',$product->name)

@section('pageTitle',$product->name)

@section('content')
    <x-product-card :product="$product"/>
    <div>
        <x-button href="{{ route('products.index') }}" color="link">Retour</x-button>
    </div>
@endsection