<form action="{{ route('orders.show', $order) }}" method="GET">
    <div class="card shadow-sm">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title mb-2">Commande #{{ $order->order_number }}</h5>
            
            <p class="text-muted small mb-2">
                <strong>Montant :</strong> {{ number_format($order->total, 2) }} €
            </p>
            <p class="mb-3">
                <strong>Statut :</strong>
                <span class="badge bg-info">{{ $order->status }}</span>
            </p>

            <button type="submit" class="btn btn-primary btn-sm align-self-start">
                Voir les détails
            </button>
        </div>
    </div>
</form>