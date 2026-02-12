<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Modifier le produit</h1>
    <form action="{{ route('products.update', $product) }}" method="POST" class="card p-4" novalidate>
        @csrf
        @method('PUT')
        <div class="row g-3">

            <!-- Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                           class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Price -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Prix (€) <span class="text-danger">*</span></label>
                    <input type="number" name="price" id="price" min="0" step="0.01" max="8000" value="{{ old('price', $product->price) }}"
                           class="form-control @error('price') is-invalid @enderror" required>
                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Image -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="image" class="form-label">URL image</label>
                    <input type="text" name="image" id="image" value="{{ old('image', $product->image) }}"
                           class="form-control @error('image') is-invalid @enderror">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Stock -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', $product->stock) }}" placeholder="0"
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
                            <option value="{{ $id }}" {{ $product->category_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Active -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-check-label" for="active">Actif</label>
                    <div class="form-check">
                        
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox" name="active" id="active" value="1" {{ old('active', $product->active) ? 'checked' : '' }}
                               class="form-check-input @error('active') is-invalid @enderror">
                        @error('active') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <!-- Description (full width) -->
            <div class="col-12">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description',$product->description) }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <x-button href="{{ route('products.index') }}" color="link">Annuler</x-button>
            <x-button type="submit">
                Modifier le produit
            </x-button>
        </div>
    </form>

    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');" class="mt-3">
        @csrf
        @method('DELETE')
        <div class="d-flex">
            <x-button type="submit" class="btn-sm ms-auto" color="danger">Supprimer le produit</x-button>
        </div>
    </form>

@endsection