<!-- resources/views/orders/show.blade.php -->
@extends('layouts.app')

@section('title','Détail de la commande')

@section('pageTitle','Détail de la commande')

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Commande #{{ $order->order_number }}</h4>
            <span class="badge bg-info fs-6">{{ $order->status }}</span>
        </div>
        <p class="text-muted small">
            <strong>Date de commande :</strong> {{ $order->created_at->format('d/m/Y à H:i') }}
        </p>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-light">
        <h5 class="mb-0">Articles commandés</h5>
    </div>
    <div class="card-body">
        @forelse ($order->orderItems as $orderItem)
            <div class="border-bottom pb-3 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h6 class="mb-1">{{ $orderItem->product->name }}</h6>
                        <p class="text-muted small mb-2">
                            Catégorie : <strong>{{ $orderItem->product->category->name }}</strong>
                        </p>
                        @if($orderItem->product->description)
                            <p class="text-muted small mb-0">
                                {{ Str::limit($orderItem->product->description, 100) }}
                            </p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="row text-end">
                            <div class="col-6">
                                <p class="mb-1">
                                    <strong>Quantité :</strong> <span class="badge bg-secondary">{{ $orderItem->quantity }}</span>
                                </p>
                                <p class="mb-0">
                                    <strong>Prix unitaire :</strong> {{ number_format($orderItem->unit_price, 2) }} €
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="mb-0">
                                    <strong class="text-danger fs-5">
                                        Sous-total : {{ number_format($orderItem->quantity * $orderItem->unit_price, 2) }} €
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Aucun article dans cette commande.</p>
        @endforelse
    </div>
</div>

<div class="card shadow-sm mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Montant total :</h5>
            <h4 class="mb-0 text-danger"><strong>{{ number_format($order->total, 2) }} €</strong></h4>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">← Retour aux commandes</a>
</div>
@endsection