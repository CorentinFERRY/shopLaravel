<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title','Categories')

@section('pageTitle','Nos Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 mb-0">Catégories</h2>
        @admin
        <a href="{{ route('categories.create') }}" class="btn btn-success">Ajouter une nouvelle catégorie</a>
        @endadmin
    </div>

    @if($categories->isEmpty())
        <div class="alert alert-info">Aucune catégorie pour le moment.</div>
    @else
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <x-categories-card :name="$category->name" :description="$category->description" />
                    <div class="mt-2 d-flex justify-content-between">
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-primary btn-sm">Voir</a>
                        @admin
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-secondary btn-sm">Modifier</a>
                        @endadmin
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection