<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - E-Commerce</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Prodotti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Carrello</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/orders">Ordini</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Esci</a>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Registrati</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center">Benvenuto nel nostro negozio!</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="card-text"><strong>{{ number_format($product->price, 2) }}€</strong></p>
                            <a href="/product/{{ $product->id }}" class="btn btn-primary">Vedi dettagli</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
