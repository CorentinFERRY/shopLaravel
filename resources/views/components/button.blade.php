@props([
    'color' => 'primary',
    'href' => null
])

@php
    $classes = [
        'primary' => 'btn btn-primary',
        'secondary' => 'btn btn-secondary',
        'outline-secondary' => 'btn btn-outline-secondary',
        'danger' => 'btn btn-danger',
        'success' => 'btn btn-success',
        'link' => 'btn btn-link',
        'info' => 'btn btn-info'
    ][$color];
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif