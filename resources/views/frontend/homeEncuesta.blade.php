<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Opinión ciudadana</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">

</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark background-primary">

        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('home') }}"><strong>tabasco</strong>.gob.mx</a>
            <li class="nav-item d-flex">

                <a class="nav-link align-self-center text-white" href="{{ route('home') }}">Inicio</a>
                <a class="nav-link align-self-center text-white" href="{{ route('home.categorias') }}">Categorías</a>

            </li>

        </div>

    </nav>

    <div class="container">

        <div class="py-5 text-center">

            <img class="d-block mx-auto mb-4" src="{{ asset('storage/firmas/escudo_de_armas.png') }}" width="80">

            <h2 class="text-primary">Opinión ciudadana</h2>

            <p class="lead">Conocer los trámites que mayor impactan en la población, a través de una plataforma digital
                que sirva como un sistema abierto de participación ciudadana, para que tanto el sector privado como el
                público en general, identifiquen las problemáticas que presentan al realizar trámites estatales y
                municipales.</p>

        </div>

        <div id="generales">

            <h2>Datos Generales</h2>
            <p>(Opcional)</p>

            <hr class="mb-4">

            <div class="mb-3">

                <label class="form-label">Género</label>

                <input type="text" placeholder="Género" class="form-control" name="nombreu" id="nombreu">

            </div>


            <div class="mb-3">

                <label class="form-label">Edad</label>

                <input type="text" placeholder="Edad" class="form-control" name="edad" id="edad">

            </div>

            <div class="mb-3">

                <label class="form-label">Grado de estudios</label>

                <select name="estudio" id="estudio" class="form-select">

                    <option value=""> Seleccione una opción</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Bachillerato">Bachillerato</option>
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Posgrado">Posgrado</option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label"> Ocupación</label>

                <input type="text" placeholder="Ocupacion" class="form-control" name="email" id="email">

            </div>

        </div>

        <h2>Encuesta</h2>

        <hr class="mb-4">

        <form class="row g-3 needs-validation" novalidate id="encuesta">

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">

                        <label for="" class="form-label">¿Qué trámites considera más engorrosos?</label>

                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">¿Por qué?</label>
                    </div>
                </div>

                <div class="row mb-3">
                   
                    <div class="col-md-6">
                     <input type="text" class="form-control" name="pregunta1" id="pregunta1" idPregunta="1" placeholder="Primer Trámite">

                    </div>

                    <div class="col-md-6">
                        <select name="porque" id="porque" class="form-select">
                            <option value="0">Selecciona una opción</option>
                            <option idPregunta="4" value="Demasiados requisitos">Demasiados requisitos</option>
                            <option idPregunta="4" value="Tiempo de Respuesta o Resolución demasiado largo">Tiempo de
                                Respuesta o Resolución demasiado largo</option>
                            <option idPregunta="4" value="Solicitud de dadivas para su agilización (Corrupción)">
                                Solicitud de dadivas para su agilización (Corrupción)</option>
                            <option idPregunta="4" value="Trámite muy complejo, proceso tedioso y largo">Trámite muy
                                complejo, proceso tedioso y largo</option>
                            <option idPregunta="4" value="Dificultad para localizar las oficinas de atención">Dificultad
                                para localizar las oficinas de atención</option>
                            <option idPregunta="4" value="Mala atención del Servidor Público">Mala atención del Servidor
                                Público</option>
                            <option idPregunta="4" value="No conozco las oficinas para realizarlo">No conozco las
                                oficinas para realizarlo</option>
                        </select>

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="pregunta2" id="pregunta2" idPregunta="2" placeholder="Segundo Trámite">
                    </div>
                    <div class="col-md-6">

                        <select name="porque2" id="porque2" class="form-select">
                            <option value="0">Selecciona una opción</option>
                            <option idPregunta="5" value="Demasiados requisitos">Demasiados requisitos</option>
                            <option idPregunta="5" value="Tiempo de Respuesta o Resolución demasiado largo">Tiempo de
                                Respuesta o Resolución demasiado largo</option>
                            <option idPregunta="5" value="Solicitud de dadivas para su agilización (Corrupción)">
                                Solicitud de dadivas para su agilización (Corrupción)</option>
                            <option idPregunta="5" value="Trámite muy complejo, proceso tedioso y largo">Trámite muy
                                complejo, proceso tedioso y largo</option>
                            <option idPregunta="5" value="Dificultad para localizar las oficinas de atención">Dificultad
                                para localizar las oficinas de atención</option>
                            <option idPregunta="5" value="Mala atención del Servidor Público">Mala atención del Servidor
                                Público</option>
                            <option idPregunta="5" value="No conozco las oficinas para realizarlo">No conozco las
                                oficinas para realizarlo</option>
                        </select>

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">                      
                        <input type="text" class="form-control" name="pregunta3" id="pregunta3" idPregunta="3" placeholder="Tercer Trámite">
                    </div>
                    <div class="col-md-6">

                        <select name="porque3" id="porque3" class="form-select">
                            <option value="0">Selecciona una opción</option>
                            <option idPregunta="6" value="Demasiados requisitos">Demasiados requisitos</option>
                            <option idPregunta="6" value="Tiempo de Respuesta o Resolución demasiado largo">Tiempo de
                                Respuesta o Resolución demasiado largo</option>
                            <option idPregunta="6" value="Solicitud de dadivas para su agilización (Corrupción)">
                                Solicitud de dadivas para su agilización (Corrupción)</option>
                            <option idPregunta="6" value="Trámite muy complejo, proceso tedioso y largo">Trámite muy
                                complejo, proceso tedioso y largo</option>
                            <option idPregunta="6" value="Dificultad para localizar las oficinas de atención">Dificultad
                                para localizar las oficinas de atención</option>
                            <option idPregunta="6" value="Mala atención del Servidor Público">Mala atención del Servidor
                                Público</option>
                            <option idPregunta="6" value="No conozco las oficinas para realizarlo">No conozco las
                                oficinas para realizarlo</option>
                        </select>

                    </div>
                </div>
            </div>

            <div class="mb-3">

                <label class="form-label">¿Conoces el Portal de Trámites del gobierno del estado?</label>

                <div class="form-check">

                    <input class="form-check-input " type="radio" id="option1" name="option2" value="Si" name="status"
                        idPregunta="7">
                    <label class="form-check-label" for="flexRadioDefault1">Si</label>

                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" id="option2" name="option2" value="No" name="status"
                        idPregunta="7">
                    <label class="form-check-label" for="flexRadioDefault1">No</label>
                </div>

            </div>

            <div class="mb-3">
                <label class="form-label">¿Qué trámite le gustaría se realizaran en línea?</label>

                <div class="col-md-12 mb-3">

                    <input type="text" name="tramiter1" id="tramite1" class="form-control" idPregunta="8" placeholder="Primer Trámite" >

                </div>

                <div class="col-md-12 mb-3">

                    <input type="text" name="tramiter2" id="tramite2" class="form-control" idPregunta="9" placeholder="Segundo Trámite" >

                </div>

                <div class="col-md-12 mb-3">

                    <input type="text" name="tramiter3" id="tramite3" class="form-control" idPregunta="10" placeholder="Tercer Trámite" >

                </div>

                <div class="col-md-12 mb-3">

                    <input type="text" name="tramiter4" id="tramite4" class="form-control" idPregunta="11" placeholder="Cuarto Trámite" >

                </div>

                <div class="col-md-12 mb-3">
                
                    <input type="text" name="tramiter5" id="tramite5" class="form-control" idPregunta="12" placeholder="Quinto Trámite" >

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">¿En que trámite te han pedido soborno?</label>

                <input type="text" class="form-control" name="preguntau" id="preguntau" idPregunta="13" placeholder="Escriba el tramite">


            </div>

            <div class="mb-3">
                <label class="form-label">
                    Ayúdanos a mejorar tu experiencia en la realización de los trámites gubernamentales a través de este
                    mecanismo de opinión ciudadana, es importante emita sus comentarios:
                </label>

                <textarea class="form-control" name="textarea" id="textarea" rows="10" idPregunta="14"></textarea>

            </div>

            <hr class="mb-4">

            <div class="col-md-12">

                <a class="btn btn-secondary btn-block" href="{{ route('home.categorias') }}">Cancelar</a>

                <button class="btn btn-primary enviar" type="button">Enviar</button>

            </div>


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

            $('#encuesta').find(
                '#pregunta1,#porque,#pregunta2,#porque2,#pregunta3,#porque3,input,#tramite1,#preguntau,#textarea'
                ).each(function(index, el) {

                let entrada = $(el);

                if (entrada.is('#pregunta1')) {

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
                }  else if (entrada.is('#porque')) {
                    if (entrada.val() == 0) {
                        errors.push({
                            'elemento': entrada,
                            'error': 'Selecciona una razón'
                        });
                    } else {
                        entrada.siblings('.message').text('');
                        entrada.parent('.form-select').removeClass('invalid');
                    }
                }  else if (entrada.is('#tramite1')) {

                    if (entrada.val().trim().length === 0) {

                        errors.push({
                            'elemento': entrada,
                            'error': 'No dejar el campo vacío'
                        });

                    } else {
                        if (!el.checkValidity()) {
                            errors.push({
                                'elemento': entrada,
                                'error': 'El campo no cumple los requisitos de validación'
                            });
                        } else {
                            entrada.siblings('.message').text('');
                            entrada.removeClass('invalid');
                        }

                    }
                } else if (entrada.is('#preguntau')) {

                    if (entrada.val().trim().length === 0) {

                        errors.push({
                            'elemento': entrada,
                            'error': 'No dejar el campo vacío'
                        });

                    } else {
                        if (!el.checkValidity()) {
                            errors.push({
                                'elemento': entrada,
                                'error': 'El campo no cumple los requisitos de validación'
                            });
                        } else {
                            entrada.siblings('.message').text('');
                            entrada.removeClass('invalid');
                        }

                    }
                } else if (entrada.is('#textarea')) {

                    if (entrada.val().trim().length === 0) {

                        errors.push({
                            'elemento': entrada,
                            'error': 'No dejar el campo vacío'
                        });

                    } else {
                        if (!el.checkValidity()) {
                            errors.push({
                                'elemento': entrada,
                                'error': 'El campo no cumple los requisitos de validación'
                            });
                        } else {
                            entrada.siblings('.message').text('');
                            entrada.removeClass('invalid');
                        }

                    }
                }
            });

            if (errors.length > 0) {
                $.each(errors, function(index, val) {
                    $('.' + campo).find(val.elemento).siblings('.message').text(val.error);
                    $('.' + campo).find(val.elemento).addClass('invalid');
                });
                return false;
            }
            return true;

        });

        // BTN
        $(document).ready(function() {

            $('.enviar').click(function() {

                let campo = 'needs-validation';

                var datos = new Array();

                if (validarCampos(campo)) {

                    $('#encuesta input:text, textarea, input:checkbox:checked, input:radio:checked, option:selected')
                        .each(function() {

                            var idPregunta = $(this).attr("idPregunta");

                            var valor = $(this).val();

                            if (idPregunta != null) {
                                datos.push({
                                    "idPregunta": idPregunta,
                                    "respuesta_texto": valor,
                                });
                            }



                        });

                    let _url = "{{ route('home.encuesta.store') }}";

                    if ($('#estudio').val() != 0 ||
                        $('#nombreu').val().trim().length != 0 ||
                        $('#email').val().trim().length != 0 ||
                        $('#edad').val().trim().length != 0) {
                        participante = {
                            idParticipante: null,
                            estudio: $('#estudio').val(),
                            nombreu: $('#nombreu').val(),
                            email: $('#email').val(),
                            edad: $('#edad').val()
                        }
                    } else {
                        participante = {
                            idParticipante: '1',
                            estudio: $('#estudio').val(),
                            nombreu: $('#nombreu').val(),
                            email: $('#email').val(),
                            edad: $('#edad').val()
                        }
                    }
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
                            idCategoria: "{{ $idCategoria }}",
                            idMunicipio: "{{ $idMunicipio }}",
                            participante: participante
                        },
                        dataType: "json",

                        success: function(response) {

                            location.href =
                                "{{ route('home.encuesta.agradecimiento', [($id = $idCategoria)]) }}";

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
