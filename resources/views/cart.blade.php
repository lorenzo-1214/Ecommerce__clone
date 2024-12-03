<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello - E-Commerce</title>
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
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Prodotti</a>
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

    <!-- Cart Content -->
    <div class="container mt-5">
        <h1 class="text-center">Il Tuo Carrello</h1>
        <div class="row">
            @foreach($cartItems as $item)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->product->image) }}" class="card-img-top" alt="{{ $item->product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <p class="card-text">{{ $item->product->description }}</p>
                            <p class="card-text"><strong>{{ number_format($item->product->price, 2) }}€</strong></p>
                            <p class="card-text">Quantità: {{ $item->quantity }}</p>
                            <form action="/remove-from-cart/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Rimuovi dal carrello</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <h3>Totale: {{ number_format($total, 2) }}€</h3>
            <a href="/checkout" class="btn btn-success">Procedi al pagamento</a>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
