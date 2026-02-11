<!-- resources/views/orders/index.blade.php -->
@extends('layouts.app')

@section('title','Mes commandes')

@section('pageTitle','Mes commandes')

@section('content')
    @foreach ($orders as $order)
        <x-order-card :order="$order" />
    @endforeach
@endsection