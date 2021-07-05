<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">

</head>

<body>

    @section('navbar')
        <nav class="navbar navbar-expand-lg navbar-dark position-absolute w-100" style="background-color: #9D2449;">

            <div class="container">

                <a class="navbar-brand fw-bold" href="#"><strong>tabasco</strong>.gob.mx</a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">

                    <i class="fas fa-bars lead text-dark"></i>

                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item d-flex">

                            <a class="nav-link align-self-center text-white" aria-current="page" href="{{ route('home.categorias') }}">Categorias</a>

                        </li>

                    </ul>

                </div>

            </div>

        </nav>
    @show

    <section class="d-flex py-5">
        <div class="container align-self-center">
            @yield('contenido')
        </div>
    </section>

    @yield('cont')

    @section('footer')

        <section class="d-flex pt-5 pb-0 h-100">
            
            <div class="container align-self-center">


                <div class="border-top py-4">
                    
                    <div class="row">
                    
                        <div class="col-lg-6 col-md-12">
                    
                            <small>2021. Comisión Estatal de Mejora Regulatoria. Todos los derechos reservados</small>
                    
                        </div>
                    
                    </div>
                
                </div>
            
            </div>
        
        </section>

    @show



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>
</body>

</html>
