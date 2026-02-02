<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ma boutique')</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}"> Home </a></li>
                <li><a href="{{ route('products.index') }}"> Catalogue </a></li>
                <li><a href="{{ route('admin.dashboard') }}"> Dashboard admin</a></li>
            </ul>
            @auth
                <!-- L'utilisateur est connecté -->
                <a href="{{ route('profile') }}">Mon profil</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit">Déconnexion</button>
                </form>
            @endauth

            @guest
                <!-- L'utilisateur n'est PAS connecté -->
                <a href="{{ route('login') }}">Connexion</a>
                <a href="{{ route('register') }}">Inscription</a>
            @endguest
        </nav>
    </header>
    <main>
        <h1>@yield('pageTitle', 'Ma boutique')</h1>
        @auth
            <h2> "Bonjour {{ auth()->user()->name }} !" </h2>
        @endauth
        @yield('content')
    </main>
    <footer>
        <p>
            {{ date('Y') }} - Mon shop Laravel © 
        </p>
    </footer>
</body>

</html>