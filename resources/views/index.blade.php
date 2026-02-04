{{-- resources/views/index.blade.php --}}

@extends('layouts.app')

@section('title','Bienvenue')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Bienvenue sur notre boutique !</h1>
            <p class="card-text">Nous avons <strong>{{ $data['nbrItems'] ?? 0 }}</strong> articles différents disponibles.</p>
            @if(isset($data['state']))
                @if($data['state'])
                    <p class="text-success mb-0">La boutique est ouverte</p>
                @else
                    <p class="text-danger mb-0">La boutique est fermée</p>
                @endif
            @endif
        </div>
    </div>
@endsection
