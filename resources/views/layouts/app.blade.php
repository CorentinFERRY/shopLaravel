<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>@yield('title', 'Ma boutique')</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Ma boutique</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Catégories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Catalogue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                Mon panier
                                <span class="badge bg-info rounded-pill ms-2">{{count(session()->get('cart', [])) }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard admin</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="px-3">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0">Déconnexion</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth

                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Inscription</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0">@yield('pageTitle', 'Ma boutique')</h1>
            @auth
                <small class="text-muted">Bonjour {{ auth()->user()->name }} !</small>
            @endauth
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-light border-top mt-4">
        <div class="container py-3">
            <div class="d-flex justify-content-between align-items-center flex-column flex-md-row">
                <small class="text-muted mb-2 mb-md-0">&copy; {{ date('Y') }} Mon shop Laravel</small>
                <div class="text-center text-md-end">
                    <a href="{{ route('home') }}" class="link-secondary me-3">Accueil</a>
                    <a href="{{ route('products.index') }}" class="link-secondary me-3">Catalogue</a>
                    <a class="link-secondary me-3" href="{{ route('cart.index') }}">
                                Mon panier<span class="badge bg-info rounded-pill ms-2">{{count(session()->get('cart', [])) }}</span>
                            </a>
                    <a href="{{ route('admin.dashboard') }}" class="link-secondary">Administration</a>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>