<div class="card shadow-sm border-0 h-100">
    <div class="card-body d-flex flex-column">
        <!-- En-tête de la commande -->
        <div class="mb-3 pb-3 border-bottom">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="card-title mb-1">Commande #{{ $order->order_number }}</h5>
                    @admin
                        <p class="text-muted small mb-0">
                            <strong>Client :</strong> {{ $order->user->name }}
                        </p>
                    @endadmin
                </div>
                <span class="badge bg-info">{{ $order->status }}</span>
            </div>
        </div>

        <!-- Détails financiers -->
        <div class="mb-3">
            <p class="mb-2">
                <strong>Montant :</strong> 
                <span class="text-danger fs-5">{{ number_format($order->total, 2) }} €</span>
            </p>
            <p class="text-muted small mb-0">
                <strong>Date :</strong> {{ $order->created_at->format('d/m/Y') }}
            </p>
        </div>

        <!-- Actions -->
        <div class="d-flex gap-2 mt-auto">
            <form action="{{ route('orders.show', $order) }}" method="GET">
                <x-button type="submit" class="btn-sm">
                    Voir les détails
                </x-button>
            </form>

            @admin
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">
                    @csrf
                    @method('DELETE')
                    <x-button type="submit" class="btn-sm" color="danger">
                        <i class="bi bi-trash"></i> Supprimer
                    </x-button>
                </form>
            @endadmin
        </div>
    </div>
</div>