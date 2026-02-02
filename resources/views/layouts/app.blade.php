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
                <li><a href="/"> Home </a></li>
                <li><a href="/products"> Catalogue </a></li>
                <li><a href="/admin/dashboard"> Dashboard admin</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>
            © {{ date('Y') }} - Mon shop Laravel
        </p>
    </footer>
</body>

</html>