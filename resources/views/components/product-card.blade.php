<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $name }}</h5>
        <p> {{ $category }}</p>
        <p class="card-text">
            Prix : <strong>{{number_format($price, 2) }} €</strong>
        </p>
    </div>
</div>
