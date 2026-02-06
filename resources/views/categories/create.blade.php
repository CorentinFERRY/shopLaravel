<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Nouveau produit</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="card p-4" novalidate>
        @csrf

        <div class="row g-3">
            <!-- Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex. Coloriage"
                           class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Description (full width) -->
            <div class="col-12">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-link">Annuler</a>
            <button type="submit" class="btn btn-primary">
                Créer la catégorie
            </button>
        </div>
    </form>
@endsection