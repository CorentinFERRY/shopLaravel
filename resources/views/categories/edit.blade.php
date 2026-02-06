<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Modifier la catégorie</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST" class="card p-4" novalidate>
        @csrf
        @method('PUT')
        <div class="row g-3">

            <!-- Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                           class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Description (full width) -->
            <div class="col-12">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description',$category->description) }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="{{ route('categories.index') }}" class="btn btn-link">Annuler</a>
            <button type="submit" class="btn btn-primary">
                Modifier la catégorie
            </button>
        </div>
    </form>

    <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');" class="mt-3">
        @csrf
        @method('DELETE')
        <div class="d-flex">
            <button type="submit" class="btn btn-danger btn-sm ms-auto">Supprimer la catégorie</button>
        </div>
    </form>

@endsection