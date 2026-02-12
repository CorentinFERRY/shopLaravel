<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Nouveau produit</h1>

    <form action="{{ route('products.store') }}" method="POST" class="card p-4">
        @csrf

        <div class="row g-3">
            <!-- Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ex. T-shirt bleu"
                           class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Price -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Prix (€) <span class="text-danger">*</span></label>
                    <input type="number" name="price" id="price" min="0" step="0.01" max="8000" value="{{ old('price') }}" placeholder="0.00"
                           class="form-control @error('price') is-invalid @enderror" required>
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Stock -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', 0) }}" placeholder="0"
                           class="form-control @error('stock') is-invalid @enderror">
                    @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Category -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="category_id" class="form-label">Catégorie</label>
                    <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                        <option value="">--Veuillez choisir une catégorie--</option>
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
            <x-button href="{{ route('products.index') }}" color="link">Annuler</x-button>
            <x-button type="submit">
                Créer le produit
            </x-button>
        </div>
    </form>
@endsection