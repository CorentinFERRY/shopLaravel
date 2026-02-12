<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title','Categories')

@section('pageTitle','Nos Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 mb-0">Catégories</h2>
        @admin
        <x-button href="{{ route('categories.create') }}" color="success">Ajouter une nouvelle catégorie</x-button>
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
                        <x-button href="{{ route('categories.show', $category) }}" class="btn-sm">Voir</x-button>
                        @admin
                        <x-button href="{{ route('categories.edit', $category) }}" color="outline-secondary" class="btn-sm">Modifier</x-button>
                        @endadmin
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection