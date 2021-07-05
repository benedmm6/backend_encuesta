<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $encuesta->nombre_encuesta }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">

    <link rel="stylesheet" href="{!! asset('css/select2.min.css') !!}">

    


</head>

<body class="bg-light">

    <div class="container">

        <div class="py-5 text-center">

            <img class="d-block mx-auto mb-4" src="http://encuestas.test/storage/firmas/escudo_de_armas.png" alt=""
                width="80">

            <h2 class="text-primary">{{ $encuesta->nombre_encuesta }}</h2>

            <p class="lead">{{ $encuesta->descripcion_encuesta }}</p>

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="py-5 text-center">

                    <h4 class="text-secondary mb-3">Instrucciones</h4>

                    <p class="lead">{{ $encuesta->instrucciones_encuesta }}</p>

                </div>

                <form action="">

                    @foreach ($preguntas as $pregunta)

                        <div class="col-lg-12 mb-3">

                            <div class="form-group">
                                <label>

                                    {{ $loop->index + 1 }}.-

                                    {{ $pregunta->nombre_pregunta }}

                                    @if ($pregunta->obligatoria == 1)
                                        {{ '*' }}
                                    @endif

                                </label>

                                @if ($pregunta->tipo_pregunta === 'buscador')

                                    <select class="form-control buscador-ejemplo1">
                                        <option> Seleccione una opción</option>
                                        @foreach ($tramites as $tramite)

                                            <option value="{{$tramite->id}}">{{$tramite->nombre_tramite}}</option>
                                            
                                        @endforeach
                                    </select>

                                @endif

                                @if ($pregunta->tipo_pregunta === 'respuestaCorta')

                                    <input type="text" class="form-control form-control-border"
                                        placeholder="Tu respuesta">

                                @endif

                                @if ($pregunta->tipo_pregunta === 'respuestaLarga')

                                    <textarea class="form-control" rows="3" placeholder="Tu respuesta"></textarea>

                                @endif

                                @if ($pregunta->tipo_pregunta === 'variasOpciones')

                                    @foreach ($opciones as $opcion)

                                        @if ($pregunta->id === $opcion->id_pregunta)

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="radio{{ $pregunta->id }}" id="radio{{ $loop->index+1 }}"
                                                    value="{{ $opcion->id }}">
                                                <label
                                                    class="form-check-label">{{ $opcion->opcion_respuesta }}</label>
                                            </div>

                                        @endif

                                    @endforeach


                                @endif

                                @if ($pregunta->tipo_pregunta === 'casillas')

                                    @foreach ($opciones as $opcion)

                                        @if ($pregunta->id === $opcion->id_pregunta)

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="checkbox{{ $pregunta->id }}"
                                                    id="checkbox{{ $loop->index+1 }}" value="{{ $opcion->id }}">
                                                <label
                                                    class="form-check-label">{{ $opcion->opcion_respuesta }}</label>
                                            </div>

                                        @endif

                                    @endforeach

                                @endif

                            </div>

                        </div>

                    @endforeach

                    <hr class="mb-4">

                    <button class="btn btn-default btn-lg btn-block" type="submit">cancelar</button>

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>

                </form>

            </div>

        </div>

    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>

    <script src="{!! asset('js/jquery.min.js') !!}"></script>

    <script src="{!! asset('js/select2.min.js') !!}"></script>

    <script>

        $(document).ready(function() {
            $('.buscador-ejemplo1').select2();
        });
    </script>

</body>

</html>
