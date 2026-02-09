<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p> {{ $product->category->name }}</p>
        <p class="card-text">
            Prix : <strong>{{number_format($product->price, 2) }} €</strong>
        </p>

        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <div class="d-flex">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" >
                <button type="submit" class="btn btn-danger btn-sm ms-auto">Ajouter au panier</button>
            </div>
        </form>
    </div>
</div>
