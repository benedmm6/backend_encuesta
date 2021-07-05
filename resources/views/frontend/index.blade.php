<?php 

    $inicio = [
        "titulo" => "Foro de consulta ciudadana",
        "descripcion" => "El debate ciudadano y los foros de opinión son los mecanismos
        de participación ciudadana de democracia interactiva, los cuales buscan abrir espacion
        para expresión y manifestación de ideas de los especialistas, los consejos consultivos,
        los OSCs y población en general, sobre los temas de relevancia y actualidad para el municipio"
    ]                        
                    
?>

<!doctype html>

<html lang="es">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">

    <title>SEDEC | Home</title>
</head>

<body>

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

                        <a class="nav-link align-self-center text-white" aria-current="page" href="#inicio">Inicio</a>

                    </li>

                    <li class="nav-item me-2">

                        <a class="btn btn-light" href="{{ route('login') }}">Inicia sesión</a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <section id="hero" style="height: 900px;">

        <div class="row g-0 h-100">

            <div class="col-lg-6 d-flex">

                <div class="content mx-auto align-self-center px-4 my-5">

                    <h1 class="display-4 fw-bold mb-4 text-primary">{{ $inicio['titulo']}}</h1>

                    <p class="lead mb-4">{{ $inicio['descripcion']}}</p>

                    <a href="{{ route('registro') }}" class="btn btn-primary mb-5">Registrate</a>

                </div>

            </div>

            <div class="col-lg-6 d-flex bg-light">

                <div class="content mx-auto align-self-center px-4 my-5">

                    <img src="phone.png" class="img-fluid">

                </div>

            </div>

        </div>

    </section>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        -->
</body>

</html>
