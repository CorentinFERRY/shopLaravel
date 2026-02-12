@extends('layouts.app')

@section('title','Inscription')

@section('pageTitle','Inscription')

@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" id="name" name="name" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email"  id="email" name="email" value="{{ old('email')}}" class="form-control @error('email') is-invalid @enderror" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>   
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required> 
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror  
        </div>      
        <x-button type="submit">S'inscrire</x-button>   
    </form>
    <div class="mt-3 text-center">
        <a href="{{ route('login') }}">Déjà inscrit ? Connectez-vous</a>
    </div>
@endsection