<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- META --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- CSS --}}

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">

    <title>@yield('title')</title>

</head>

{{-- BODY --}}

<body class="bg-light">
    {{-- navegacion --}}

    <nav class="navbar navbar-expand-lg navbar-dark background-primary">

        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('home') }}"><strong>tabasco</strong>.gob.mx</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">

                <i class="fas fa-bars lead text-light"></i>

            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

                    <li class="nav-item d-flex">

                        <a class="nav-link align-self-center text-white" href="{{ route('home') }}">Inicio</a>

                    </li>

                    @if (empty(session('user_id')))

                    <li class="nav-item d-flex">

                        <a class="nav-link align-self-center text-white" href="{{ route('home.usuarios.index') }}">Registro</a>

                    </li>

                    <li class="nav-item d-flex">

                        <a class="nav-link align-self-center text-white" href="{{ route('loginu.index') }}">Iniciar Sesión</a>

                    </li>
                        
                    @endif

                    @if (!empty(session('user_id')))
                        
                    <li class="nav-item d-flex">

                        <a class="nav-link align-self-center text-white" href="{{ route('home.categorias') }}">Categorias</a>

                    </li>

                    <li class="nav-item d-flex">

                        <a class="nav-link align-self-center text-white" href="{{route('home.logout')}}">Cerrar Sesión</a>

                    </li>

                    @endif

            </div>

        </div>

    </nav>

    {{-- END navegacion --}}

    {{-- END HEADER --}}

    {{-- CONTENIDO --}}

    @yield('contenido')

    {{-- END CONTENIDO --}}

    {{-- FOOTER --}}

    @section('footer')

        <footer class="bg-dark footer">
            <div class="container">
                {{-- <img src="assets/images/logo-light.svg" class="logo-brand" alt="logo">
                <ul class="list-inline">
                    <li class="list-inline-item footer-menu"><a href="#">Home</a></li>
                    <li class="list-inline-item footer-menu"><a href="#">Portfolio</a></li>
                    <li class="list-inline-item footer-menu"><a href="#">About us</a></li>
                    <li class="list-inline-item footer-menu"><a href="#">Pricing</a></li>
                    <li class="list-inline-item footer-menu"><a href="#">Contact</a></li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#"><img src="assets/images/instagram.svg" class="img-fluid"></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><img src="assets/images/twitter.svg" class="img-fluid"></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><img src="assets/images/youtube.svg" class="img-fluid"></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><img src="assets/images/dribbble.svg" class="img-fluid"></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><img src="assets/images/facebook.svg" class="img-fluid"></a>
                    </li>
                </ul> --}}
                <small>Gobierno del Estado de Tabasco © Derechos Reservados</small>
            </div>
        </footer>

    @show

    {{-- END FOOTER --}}

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>

</body>

{{-- END BODY --}}

</html>
