@extends('adminlte::page')

@section('title', 'Agregar preguntas')

@section('content_header')
    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Agregar preguntas</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

                    <li class="breadcrumb-item"><a href="{{ route('admin.encuestas.index') }}"><i
                                class="fa fa-dashboard"></i>Encuestas</a></li>

                    <li class="breadcrumb-item active">Añadir preguntas</li>

                </ol>

            </div>
        </div>

    </div>
@stop

@section('content')

    {{-- DATOS DE LA ENCUESTA --}}

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h2 class="card-title">

                        <i class="fas fa-file-alt"></i>

                        {{ $encuesta->nombre_encuesta }}

                    </h2>

                </div>

                <div class="card-body">

                    <dl class="row">

                        <dt class="col-sm-4">Descripción de la encuesta</dt>

                        <dd class="col-sm-8">{{ $encuesta->descripcion_encuesta }}</dd>

                        <dt class="col-sm-4">Instrucciones</dt>

                        <dd class="col-sm-8">{{ $encuesta->instrucciones_encuesta }}</dd>

                        <dt class="col-sm-4">Agradecimiento</dt>

                        <dd class="col-sm-8">{{ $encuesta->agradecimiento_encuesta }}</dd>

                        <dt class="col-sm-4">Estado</dt>

                        <dd class="col-sm-8">

                            @if ($encuesta->estado == 0)

                                <span class="badge badge-warning">Borrador</span>

                            @else

                                <span class="badge badge-success">Publicado</span>


                            @endif

                        </dd>

                    </dl>

                </div>
                <!-- /.card-body -->

            </div>

        </div>

    </div>

    {{-- END Datos de la encuesta --}}

    {{-- HERRAMIENTAS PREGUNTAS --}}

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Herramientas
                    </h3>

                </div>

                <div class="card-body">

                    <button class="btn btn-success"data-toggle="modal" data-target="#preguntas">Agregar pregunta</button>

                </div>

            </div>

        </div>

    </div>

    {{-- END HERRAMIENTAS PREGUNTAS --}}

    {{-- MOSTRAR PREGUNTAS --}}

    <div class="col-md-12">

        {{-- MUESTRA TODAS LAS PREGUNTAS --}}

        @foreach ($preguntas as $pregunta)

            <div class="callout callout-info">

                <div class="form-group">

                    <label>

                    @if ($pregunta->obligatoria == 1)
                            {{ '*' }}
                    @endif

                    {{ $pregunta->nombre_pregunta}}

                    </label>

                    @if ($pregunta->tipo_pregunta === 'buscador')

                        <select class="form-control buscador-ejemplo">
                            <option> Trámites por categorias</option>
                            <option> Trámite 1</option>
                            <option> Trámite 2</option>
                            <option> Trámite 3</option>
                        </select>
                        
                    @endif

                    @if ($pregunta->tipo_pregunta === 'respuestaCorta')

                        <input type="text" class="form-control form-control-border" placeholder="Respuesta de la pregunta" disabled>
                        
                    @endif

                    @if ($pregunta->tipo_pregunta === 'respuestaLarga')

                        <textarea class="form-control" rows="5" placeholder="Respuesta Larga" disabled></textarea>
                        
                    @endif

                    @if ($pregunta->tipo_pregunta === 'variasOpciones')

                        @foreach ($opciones as $opcion)

                            @if ($pregunta->id === $opcion->id_pregunta)

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" disabled>
                                    <label class="form-check-label">{{ $opcion->opcion_respuesta}}</label>
                                </div>
                                
                            @endif
                            
                        @endforeach

  
                    @endif

                    @if ($pregunta->tipo_pregunta === 'casillas')

                        @foreach ($opciones as $opcion)

                            @if ($pregunta->id === $opcion->id_pregunta)

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled>
                                    <label class="form-check-label">{{ $opcion->opcion_respuesta}}</label>
                                </div>
                                
                            @endif
                        
                        @endforeach
                        
                    @endif

                        <br>
                        
                        <div class="form-group">
                            <button url="{{ route('admin.encuestas.deletePreguntas', $pregunta->id) }}" type="submit" class="btn btn-danger btnBorrar" idPregunta="{{ $pregunta->id}}" >Borrar</button>
                        </div>

                </div>

            </div>

        @endforeach

    </div>

    {{-- MODAL AGREGAR PREGUNTAS --}}

    <div class="modal fade" id="preguntas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar pregunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="idEncuesta" value="{{ $idEncuesta }}" id="idEncuesta">

                    <select class="form-control" name="tipo_pregunta" id="tipo">
                        <option value="">Selecciona un tipo de pregunta</option>
                        <option value="buscador">Buscador</option>
                        <option value="respuestaCorta">Respuesta Corta</option>
                        <option value="respuestaLarga">Respuesta Larga</option>
                        <option value="variasOpciones">Varias Opciones</option>
                        <option value="casillas">Casillas</option>
                    </select>

                    {{-- PREGUNTA TIPO BUSCADOR --}}

                    <div class="row box buscador">
                        <div class="col-md-12">

                            <div class="form-group col-md-12">
                                <label for="">Pregunta</label>
                                <input type="text" class="form-control" id="buscador" placeholder="Pregunta">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">Tipo de buscador</label>

                                {!! Form::select('id_categoria', $categorias, null, ['placeholder' => 'Eliga una Categoria', 'class' => 'form-control', 'id' => 'tipo_busqueda']) !!}
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="1" type="checkbox" id="check_buscador">
                                    <label class="form-check-label">Obligatoria</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PREGUNTA DE RESPUESTA CORTA --}}

                    <div class="row box respuestaCorta">

                        <div class="col-md-12">

                            <div class="form-group col-md-12">
                                <label for="">Pregunta</label>
                                <input type="text" class="form-control" id="respuestaCorta" placeholder="Pregunta">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="">Respuesta</label>
                                <input type="text" class="form-control" placeholder="Respuesta Corta" disabled>
                            </div>

                            <div class="form-group col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" value="1" id="check_respuestaCorta" type="checkbox">
                                    <label class="form-check-label">Obligatoria</label>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- END PREGUNTA DE RESPUESTA CORTA --}}

                    {{-- RESPUESTA LARGA --}}

                    <div class="row box respuestaLarga">

                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Pregunta</label>
                                <input type="text" class="form-control" id="respuestaLarga" placeholder="Pregunta">
                            </div>

                            <div class="form-group">
                                <label for="">Respuesta</label>
                                <textarea class="form-control" rows="5" placeholder="Respuesta Larga" disabled></textarea>

                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="1" id="check_respuestaLarga" type="checkbox">
                                    <label class="form-check-label">Obligatoria</label>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- END RESPUESTA LARGA --}}

                    {{-- PREGUNTA VARIAS OPCIONES --}}

                    <div class="row box variasOpciones">

                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Pregunta</label>
                                <input type="text" class="form-control" id="variasOpciones" placeholder="Pregunta">
                            </div>

                            <div class="form-group">
                                <label for="">Añadir opción</label>
                                <input type="text" name="opcionNueva" id="opcionNueva" class="form-control">
                                <br>
                                <button class="btn btn-primary addRadio"><i class="fas fa-plus"></i></button>
                            </div>

                            <div class="form-group opciones">
                                <label for="">Opciones</label>

                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="1" id="check_variasOpciones" type="checkbox">
                                    <label class="form-check-label">Obligatoria</label>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- END PREGUNTA VARIAS OPCIONES --}}

                    {{-- PREGUNTA CASILLAS --}}

                    <div class="row box casillas">

                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Pregunta</label>
                                <input type="text" class="form-control" id="casillas" placeholder="Pregunta">
                            </div>

                            <div class="form-group">
                                <label for="">Añadir opción</label>
                                <input type="text" name="casillaNueva" id="casillaNueva" class="form-control">
                                <br>
                                <button class="btn btn-primary addCasilla"><i class="fas fa-plus"></i></button>
                            </div>

                            <div class="form-group opcionesCasilla">
                                <label for="">Opciones</label>



                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="1" id="check_casillas" type="checkbox">
                                    <label class="form-check-label">Obligatoria</label>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- END PREGUNTA CASILLAS --}}

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    <button type="button" class="btn btn-primary addPregunta">Agregar pregunta</button>

                </div>
            </div>
        </div>
    </div>

    {{-- END MODAL AGREGAR PREGUNTAS --}}


@stop

@section('plugins.sweetalert2', true)
@section('plugins.Select2', true)


@section('js')


    <script>

        // CONFIGURACION DE SWEET ALERT
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        // BORRAR PREGUNTA
        $(document).ready(function(){

            $('.btnBorrar').click(function(){

                var idPregunta = $(this).attr("idPregunta");

                let _url = '{!! url("encuestas/'+idPregunta+'/preguntas/delete") !!}';

                console.log(_url);
                
                let _token   = $('meta[name="csrf-token"]').attr('content');

                Swal.fire({
                            title: '¿Está seguro de borrar la pregunta?',
                            text: '¡Si no lo está puede cancelar la acción!',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Cancelar',
                            confirmButtonText: 'Si, borrar la pregunta'
                        }).then((result) => {
                            if(result.value){
                               
                                $.ajax({
                                    url: _url,
                                    type: 'DELETE',
                                    data: {
                                    _token: _token,
                                    },
                                    success: function(response) {

                                        location.reload();
                    
                                        Toast.fire('La pregunta se elimino correctamente', '', 'success');

                                    }
                                });

                            }
                        });

            });

        });

        // INICIALIZA EL SELECT2
        $(document).ready(function() {
            $('.buscador-ejemplo').select2();
        });

        $(document).ready(function() {
            $("#tipo").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show(1000);
                    } else {
                        $(".box").hide(1000);
                    }
                });
            }).change();
        });

        const radios = [];

        const check = [];

        // AGREGAR OPCIONES A LOS RADIO BOX

        $(document).ready(function() {

            $('.addRadio').click(function() {

                var valor = $('#opcionNueva').val();

                radios.push(valor);

                $('#opcionNueva').val("");


                $('.opciones').append(
                    `<div class="form-check">
                                    <input class="form-check-input" type="radio" name="opciones" value="${valor}" disabled>
                                    <label class="form-check-label">${valor}</label>
                        </div>`
                );

            });

        });

        // AGREGAR OPCIONES A LAS CASILLAS

        $(document).ready(function() {

            $('.addCasilla').click(function() {

                var valor = $('#casillaNueva').val();

                check.push(valor);

                $('#casillaNueva').val("");

                $('.opcionesCasilla').append(
                    `<div class="form-check">
                                <input class="form-check-input" name="opcionesCasillas" id="opcionesCasillas" value="${valor}" type="checkbox" disabled>
                                <label class="form-check-label">${valor}</label>
                        </div>`
                );

            });

        });

        // ENVIA PREGUNTA

        $(document).ready(function() {

            $('.addPregunta').click(function() {

                var id = $('#idEncuesta').val()

                var optionValue = $('#tipo').val();

                // VERIFICA QUE OPCIÓN ESTA SELECCIONADA

                if (optionValue) {

                    var nombre_pregunta = $('#' + optionValue).val();

                    // let _url = "http://encuestas.test/encuestas/" + id + "/preguntas/create";

                    let _url = "{!! url('encuestas/" + id + "/preguntas/create')!!}";

                    if ($('#check_' + optionValue + ':checked').val()) {
                        var obligatoria = '1';
                    } else {
                        var obligatoria = '0';
                    }

                    if (optionValue == 'casillas') {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: _url,
                            type: "POST",
                            data: {
                                nombre_pregunta: nombre_pregunta,
                                tipo_pregunta: optionValue,
                                obligatoria: obligatoria,
                                id_encuesta: id,
                                opciones: check,
                            },
                            dataType: "json",
                            success: function(response) {

                                $("#preguntas").modal('hide');

                                location.reload();

                                Toast.fire('La pregunta se agrego correctamente', '',
                                'success');

                            }
                        });


                    }

                    if (optionValue == 'variasOpciones') {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: _url,
                            type: "POST",
                            data: {
                                nombre_pregunta: nombre_pregunta,
                                tipo_pregunta: optionValue,
                                obligatoria: obligatoria,
                                id_encuesta: id,
                                opciones: radios,
                            },
                            dataType: "json",
                            success: function(response) {

                                $("#preguntas").modal('hide');

                                location.reload();

                                Toast.fire('La pregunta se agrego correctamente', '',
                                'success');

                            }
                        });


                    }

                    if (optionValue === 'buscador') {

                        var tipo = $('#tipo_busqueda').val();

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: _url,
                            type: "POST",
                            data: {
                                nombre_pregunta: nombre_pregunta,
                                tipo_pregunta: optionValue,
                                obligatoria: obligatoria,
                                id_encuesta: id,
                                busqueda: 1,
                                tipo_busqueda: tipo,
                            },
                            dataType: "json",
                            success: function(response) {

                                $("#preguntas").modal('hide');

                                location.reload();

                                Toast.fire(
                                    'La pregunta se agrego correctamente',
                                    '', 'success')
                            }
                        });

                    }

                    if (optionValue === 'respuestaCorta' || optionValue === 'respuestaLarga') {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: _url,
                            type: "POST",
                            data: {
                                nombre_pregunta: nombre_pregunta,
                                tipo_pregunta: optionValue,
                                obligatoria: obligatoria,
                                id_encuesta: id,
                            },
                            dataType: "json",
                            success: function(response) {
                                $("#preguntas").modal('hide');

                                location.reload();

                                Toast.fire(
                                    'La pregunta Se agrego correctamente',
                                    '', 'success')
                            }
                        });

                    }

                } else {
                    console.log('error');
                }

            });
        });
    </script>

@stop
