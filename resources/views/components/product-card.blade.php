<div class="card shadow-sm">
    <div class="card-body d-flex flex-column">
        <h5 class="card-title mb-1 text-truncate">{{ $product->name }}</h5>
        <p class="text-muted mb-2 small">{{ $product->category->name }}</p>

        <p class="card-text mb-2">
            Prix : <strong class="text-danger">{{ number_format($product->price, 2) }} €</strong>
        </p>

        <form action="{{ route('cart.add') }}" method="POST" class="d-flex align-items-center gap-2">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="number" name="quantity" value="1" min="1" class="form-control form-control-sm w-25" aria-label="Quantité">
            <button type="submit" class="btn btn-danger btn-sm ms-auto">Ajouter au panier</button>
        </form>
    </div>
</div>
