@extends('layouts.app')

@section('title','Connexion')

@section('pageTitle','Connexion')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email')}}" class="form-control" required>
        </div>   
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label" for="remember">Se souvenir de moi</label>
            <input type="checkbox" class="form-check-input form-control" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
        </div>
        <x-button type="submit">Se connecter</x-button>   
    </form>
    <div class="mt-3 text-center">
        <a href="{{ route('register') }}">Pas de compte ? Inscrivez-vous </a>
    </div>
@endsection