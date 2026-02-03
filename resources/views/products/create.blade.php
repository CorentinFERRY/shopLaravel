<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Nouveau produit</h1>

    <form action="{{ route('products.store') }}" method="POST" class="max-w-lg">
        @csrf

         <label for="name" class="block font-medium mb-1">Nom</label>
        <div class="mb-4">
            <input type="text" name="name" id="name"
                   value="{{ old('name') }}"
                   class="w-full border rounded px-3 py-2"
                   required>       
        </div>

        <label for="description" class="block font-medium mb-1">Description</label>
        <div class="mb-4">  
            <textarea name="description" id="description"
                   value="{{ old('description') }}"
                   class="w-full border rounded px-3 py-2">  
            </textarea>   
        </div>

        <label for="price" class="block font-medium mb-1">Prix</label>
        <div class="mb-4">  
            <input type="number" name="price" id="price"
                   min = "0"
                   step = "0.01"
                   max = "8000"
                   value="{{ old('price') }}"
                   class="w-full border rounded px-3 py-2"
                   required>  
        </div>

        <label for="stock" class="block font-medium mb-1">Stock</label>
        <div class="mb-4">
            <input type="number" name="stock" id="stock"
                   value="{{ old('stock') }}"
                   class="w-full border rounded px-3 py-2"
                   min = "0">       
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Créer le produit
        </button>
    </form>
@endsection