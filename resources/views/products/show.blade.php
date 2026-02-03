<!-- products/product.blade.php -->

@extends('layouts.app')

@section('title',$product->name)

@section('pageTitle',$product->name)

@section('content')
    <x-product-card
        :name="$product->name"
        :price="$product->price"
    />
@endsection