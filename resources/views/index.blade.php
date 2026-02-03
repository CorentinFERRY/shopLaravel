{{-- resources/views/index.blade.php --}}

@extends('layouts.app')

@section('title','Bienvenue')

@section('content')
    <h1>Bienvenue sur notre boutique !</h1>
    <p> Nous avons {{ $data['nbrItems'] }} articles différents disponible</p>
    @if($data['state'])
        <p style="color: green;">La boutique est ouverte</p>
    @else
        <p style="color: red;">La boutique est fermée </p>
    @endif
@endsection
