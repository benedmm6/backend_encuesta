@extends('adminlte::page')

@section('title', 'Editar encuesta')

@section('content_header')

    <div class="container-fluid">
            
        <div class="row mb-2">
            
            <div class="col-sm-6">

                <h1>Editar encuesta</h1>

            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="{{ route('dash')}}"><i class="fa fa-dashboard"></i>Inicio</a></li>
                    
                    <li class="breadcrumb-item active">

                        <a href="{{ route('admin.encuestas.index')}}"><i class="fa fa-dashboard"></i>Encuestas</a>

                    </li>

                    <li class="breadcrumb-item active">Editar encuesta</li>
            
                </ol>

            </div>
        </div>

    </div

@stop

@section('content')

    <div class="container-fluid">

        <div class="row">
       
            <div class="col-12">

                {{-- DATOS DE LA ENCUESTA --}}
           
                <div class="card card-primary">
           
                    <div class="card-header">
                        
                        <h3 class="card-title">Datos de la encuesta</h3>
    
                    </div>
    
                    <div class="card-body">

                        {!! Form::model($encuesta, ['route' => ['admin.encuestas.update', $encuesta], 'method' => 'put']) !!}

                        <div class="form-group">

                            {!! Form::label('nombre_encuesta', 'Titulo de la encuesta') !!}

                            {!! Form::text('nombre_encuesta', null, ['class' => 'form-control','placeholder' => 'Titulo de la encuesta']) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('descripcion_encuesta', 'Descripción de la encuesta') !!}

                            {!! Form::textarea('descripcion_encuesta', null, ['rows' => '3','class' => 'form-control','placeholder' => 'Descripción de la encuesta']) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('instrucciones_encuesta', 'Instrucciones de la encuesta') !!}

                            {!! Form::textarea('instrucciones_encuesta', null, ['rows' => '3','class' => 'form-control','placeholder' => 'Instrucciones de la encuesta']) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('agradecimientos_encuesta', 'Agradecimientos de la encuesta') !!}

                            {!! Form::textarea('agradecimiento_encuesta', null, ['rows' => '3','class' => 'form-control','placeholder' => 'Agradecimientos de la encuesta']) !!}

                        </div>

                        <div class="row">
                            
                            <div class="form-group col-md-6">

                                {!! Form::label('vigencia', 'Vigencia') !!}

                                {!! Form::date('fecha_vencimiento', date('Y-m-d', strtotime($encuesta->fecha_vencimiento)), ['class' =>'form-control']) !!}
    
                            </div>
    
                            <div class="form-group col-md-6">

                                {!! Form::label('categoria', 'Categoria') !!}

                                {!! Form::select('id_categoria', $categorias, $encuesta->id_categoria, ['class' =>'form-control','placeholder' => 'Selecciona una categoria']); !!}
    
                            </div>

                            <div class="form-group col-md-6">

                                {!! Form::label('estado', 'Estado') !!}

                                {!! Form::select('estado', ['0' => 'Borrador', '1' => 'Publicado'], $encuesta->estado, ['class' =>'form-control']); !!}
    
                            </div>

                        </div>

                            {!! Form::submit('Editar encuesta', ['class' => 'btn btn-primary btnEditar', 'idEncuesta' => $encuesta->id]) !!}

                        {!! Form::close() !!}

                    </div>
           
                </div>

            </div>
        
        </div>

    </div>


@stop

@section('js')

    <script>

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

        @if(session('info') == 'editado')
        
             Toast.fire('La encuesta se actualizo correctamente', '', 'success');

        @endif

    </script>

@stop