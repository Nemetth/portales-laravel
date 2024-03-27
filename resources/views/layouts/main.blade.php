<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Portales</title>
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ url('img/favicon/favicon.ico') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" alt="Logo de Portales" href="#"><img
                        src="{{ url('img/Portales-logo.svg') }}"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">Quiénes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('magic.list') }}">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('article.list') }}">Noticias</a>
                        </li>
                        <div class="d-flex flex-column flex-lg-row ">
                            @auth
                                @if (auth()->user()->role === 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('panel') }}">Panel de administración</a>
                                    </li>
                                @else
                                @endif
                                <li class="nav-item align-self-center">
                                    <form action="{{ route('auth.logout.process') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="user-btn align-self-center">{{ auth()->user()->name }} (Cerrar
                                            Sesión)</button>
                                    </form>
                                </li>
                                <li class="nav-item align-self-center"><a href="{{ route('user.profile') }}"
                                        class="nav-link">Mi perfil</a></li>
                                <li class="nav-item align-self-center"><a href="{{ route('cart.index') }}">Carrito</a></li>
                            @else
                                <li class="nav-item align-self-center">
                                    <a class="nav-link" href="{{ route('auth.login.form') }}">Iniciar Sesión</a>
                                </li>
                                <li class="nav-item align-self-center">
                                    <a class="nav-link" href="{{ route('auth.register.form') }}">Registrarse</a>
                                </li>
                            @endauth
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
        <footer class="footer">
            <p><span>Tomás Cahue & Florencia Velez &copy; Portales y Comercio Electrónico. 2023 </p>
        </footer>
    </div>
</body>

</html>
