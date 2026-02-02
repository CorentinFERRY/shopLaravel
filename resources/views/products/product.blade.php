<!-- products/product.blade.php -->

@extends('layouts.app')

@section('title',$product['name'])

@section('content')
    <p> {{ $product['name']}} </p>
    <p> {{ $product['price']}} </p>
@endsection