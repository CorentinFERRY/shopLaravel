<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title','Categories')

@section('pageTitle','Nos Categories')

@section('content')
    @forelse ($categories as $category)
        <p>{{ $category->name }}</p><br>
    @empty
        <p> No Products ! </p>
    @endforelse
    <br>
@endsection