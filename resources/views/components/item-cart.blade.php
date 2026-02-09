<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text"> {{ $product->category->name }}</p>
        <p class="card-text">
            Prix unitaire : {{number_format($product->price, 2)}} €
            <br>
            Total : <strong>{{number_format($product->totalPrice, 2)}} € </strong>
        </p>
        <form action="{{ route('cart.update', $product) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="product_id" name="product_id" value={{ $product->id }}>
            <label for="quantity"> Quantité :</label>
            <input type="number" id="quantity" name="quantity" value={{ $product->quantity }} class="form-control @error('quantity') is-invalid @enderror">
            @error('quantity') 
                <div class="invalid-feedback">{{ $message }}</div> 
            @enderror
            <button type="submit" class="btn btn-info btn-sm ms-auto">Modifier</button>
        </form>

        <form action="{{ route('cart.remove',$product) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="d-flex">
                <button type="submit" class="btn btn-danger btn-sm ms-auto">Supprimer</button>
            </div>
        </form>
    </div>
</div>