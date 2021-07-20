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

    <nav class="navbar navbar-expand-lg navbar-dark background-primary">

        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('home') }}"><strong>tabasco</strong>.gob.mx</a>

        </div>

    </nav>

    <div class="container">

        <div class="py-5 text-center">

            <img class="d-block mx-auto mb-4" src="{{ asset('storage/firmas/escudo_de_armas.png') }}" width="80">

            <h2 class="text-primary">{{ $encuesta->nombre_encuesta }}</h2>

            <p class="lead">{{ $encuesta->descripcion_encuesta }}</p>

        </div>

        <form class="row g-3 needs-validation" novalidate>

            @foreach ($preguntas as $pregunta)

                @php
                    
                    $nombre = $pregunta->tipo_pregunta . ($loop->index + 1);
                    
                @endphp


                <div class="form-group">

                    <label class="form-label">

                        @if ($pregunta->nombre_pregunta != '')

                            {{ $loop->index + 1 . '.- ' . $pregunta->nombre_pregunta }}

                        @endif

                        @if ($pregunta->obligatoria == 1)

                            {{ '*' }}
                        @endif

                    </label>

                    @if ($pregunta->tipo_pregunta === 'buscador')

                        <select id="{{ $nombre }}" name="{{ $nombre }}" idPregunta="{{ $pregunta->id }}"
                            tipoPregunta="{{ $pregunta->tipo_pregunta }}"
                            class="form-control buscador-ejemplo1 @php
                                if ($pregunta->obligatoria == 1) {
                                    echo 'buscador_obligatoria';
                                }
                            @endphp" @if ($pregunta->obligatoria == 1) required @endif>
                            <option value="0"> Seleccione una opción</option>
                            @foreach ($tramites as $tramite)

                                <option idPregunta="{{ $pregunta->id }}"
                                    tipoPregunta="{{ $pregunta->tipo_pregunta }}" value="{{ $tramite->id }}">
                                    {{ $tramite->nombre_tramite }}
                                </option>

                            @endforeach
                        </select>

                    @endif

                    @if ($pregunta->tipo_pregunta === 'respuestaCorta')

                        <input type="text" name="{{ $nombre }}" idPregunta="{{ $pregunta->id }}"
                            tipoPregunta="{{ $pregunta->tipo_pregunta }}"
                            class="form-control form-control-border @php
                                if ($pregunta->obligatoria == 1) {
                                    echo 'obligatoria';
                                }
                            @endphp" placeholder="Tu respuesta"
                            obligatorio="{{ $pregunta->obligatoria }}">

                    @endif

                    @if ($pregunta->tipo_pregunta === 'respuestaLarga')

                        <textarea name="{{ $nombre }}" class="form-control" rows="3"
                            idPregunta="{{ $pregunta->id }}" tipoPregunta="{{ $pregunta->tipo_pregunta }}"
                            placeholder="Tu respuesta" obligatorio="{{ $pregunta->obligatoria }}"></textarea>

                    @endif

                    @if ($pregunta->tipo_pregunta === 'variasOpciones')

                        @foreach ($opciones as $opcion)

                            @if ($pregunta->id === $opcion->id_pregunta)

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{ $nombre }}"
                                        idPregunta="{{ $pregunta->id }}"
                                        tipoPregunta="{{ $pregunta->tipo_pregunta }}"
                                        id="radio{{ $loop->index + 1 }}" value="{{ $opcion->id }}">
                                    <label class="form-check-label">{{ $opcion->opcion_respuesta }}</label>
                                </div>

                            @endif

                        @endforeach

                    @endif

                    @if ($pregunta->tipo_pregunta === 'casillas')

                        @foreach ($opciones as $opcion)

                            @if ($pregunta->id === $opcion->id_pregunta)

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" idPregunta="{{ $pregunta->id }}"
                                        tipoPregunta="{{ $pregunta->tipo_pregunta }}" name="{{ $nombre }}"
                                        id="checkbox{{ $loop->index + 1 }}" value="{{ $opcion->id }}">
                                    <label class="form-check-label">{{ $opcion->opcion_respuesta }}</label>
                                </div>

                            @endif

                        @endforeach

                    @endif

                    <span class="message help-block text-danger"></span>


                </div>

            @endforeach

            <hr class="mb-4">

            <div class="col-md-12">

                <a class="btn btn-secondary btn-block" href="{{ route('home.categorias') }}">Cancelar</a>

                <button class="btn btn-primary enviar" type="button">Enviar</button>

            </div>

            {{ $idUsuario }}

        </form>

    </div>

    <br>

    <br>

    <br>

    <footer class="bg-dark footer">
        <div class="container">
            <small>Gobierno del Estado de Tabasco © Derechos Reservados</small>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>

    <script src="{!! asset('js/jquery.min.js') !!}"></script>

    <script src="{!! asset('js/select2.min.js') !!}"></script>

    <script>
        const validarCampos = ((campo) => {

            let errors = [];

            $('.' + campo).find('input,textarea,select').each(function(index, el) {

                let entrada = $(el);

                if (entrada.is('input:text') || entrada.is('textarea')) {

                    if (entrada.val().trim().length === 0) {

                        errors.push({
                            'elemento': entrada,
                            'error': 'No dejar el campo vacío'
                        });

                    } else {
                        // si no cumplio la validación de pattern
                        if (!el.checkValidity()) {
                            errors.push({
                                'elemento': entrada,
                                'error': 'El campo no cumple los requisitos de validación'
                            });
                        }
                        // caso contrario removes el mensaje de error
                        else {
                            entrada.siblings('.message').text('');
                            entrada.removeClass('invalid');
                        }

                    }
                } else if (entrada.is("select")) {
                    // Validamos que esté seleccionada una opción del select
                    if (entrada.val() == 0) {
                        errors.push({
                            'elemento': entrada,
                            'error': 'Selecciona un trámite'
                        });
                    } else {
                        entrada.siblings('.message').text('');
                        entrada.parent('.form-select').removeClass('invalid');
                    }
                } else if (entrada.prop('type') == 'checkbox' || entrada.prop('type') == 'radio') {

                    if (!$('.' + campo).find('input[name="' + entrada.prop('name') + '"]:checked').length) {

                        errors.push({
                            'elemento': entrada,
                            'error': 'Selecciona una opción',
                        });

                    } else {
                        entrada.siblings('.message').text('');
                        entrada.removeClass('invalid');
                    }

                }

            });

            if (errors.length > 0) {
                $.each(errors, function(index, val) {
                    $('.' + campo).find(val.elemento).siblings('.message').text(val.error);
                    $('.' + campo).find(val.elemento).parent('.form-group').addClass('invalid');
                });
                return false;
            }
            return true;

        });

        // BTN
        $(document).ready(function() {

            $('.buscador-ejemplo1').select2();

            $('.enviar').click(function() {

                let campo = 'needs-validation';

                var datos = new Array();

                if (validarCampos(campo)) {

                    $('#encuesta input:text, textarea, input:checkbox:checked, input:radio:checked, option:selected')
                        .each(function() {

                            var idPregunta = $(this).attr("idPregunta");

                            var tipoPregunta = $(this).attr("tipoPregunta");

                            var nombre = $(this).attr("tipoPregunta")

                            var valor = $(this).val();

                            if (tipoPregunta == 'respuestaCorta' || tipoPregunta == 'respuestaLarga' ||
                                tipoPregunta == 'buscador') {

                                datos.push({
                                    "id_pregunta": idPregunta,
                                    "tipo_pregunta": tipoPregunta,
                                    "respuesta_texto": valor,
                                    "id_usuario": "{{ session('user_id') }}",
                                    "id_opcion": null
                                });

                            } else {

                                datos.push({
                                    "id_pregunta": idPregunta,
                                    "tipo_pregunta": tipoPregunta,
                                    "respuesta_texto": null,
                                    "id_usuario": "{{ session('user_id') }}",
                                    "id_opcion": valor
                                });

                            }

                        });

                    let _url = "{{ route('home.encuesta.store') }}";

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: _url,
                        type: "POST",
                        data: {
                            data: datos,
                            idEncuesta: '{{ $idEncuesta }}',
                            idUsuario: "{{ session('user_id')}}",
                            idMunicipio: "{{ $idMunicipio }}"
                        },
                        dataType: "json",
                        success: function(response) {

                            location.href = "{{ route('home.encuesta.agradecimiento', [($id = $encuesta->id)]) }}";
                                

                        }
                    });
                } else {
                    event.preventDefault();
                    event.stopPropagation();
                }

            });

        });
    </script>

</body>

</html>
