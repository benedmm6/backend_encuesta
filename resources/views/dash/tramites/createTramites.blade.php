@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

    <div class="container-fluid">
            
        <div class="row mb-2">
            
            <div class="col-sm-6">

                <h1>Nuevo Tramite</h1>

            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="{{ route('dash')}}"><i class="fa fa-dashboard"></i>Inicio</a></li>
                    
                    <li class="breadcrumb-item active">

                        <a href="{{ route('admin.tramites.index')}}"><i class="fa fa-dashboard"></i>Tramites</a>

                    </li>

                    <li class="breadcrumb-item active">Nuevo Tramite</li>
            
                </ol>

            </div>
        </div>

    </div

@stop

@section('content')

    <div class="container-fluid">

        <div class="row">
       
            <div class="col-12">
           
                <div class="card">
           
                    <div class="card-header">
                        
                        <h3 class="card-title">Agregar un nuevo tramite</h3>
    
                    </div>
    
                    <div class="card-body">
    
                        {!! Form::open(['route' => 'admin.tramites.store']) !!}

                            <div class="form-group">
                                {!! Form::label('nombre_tramite', 'Nombre del tramite') !!}
                                {!! Form::text('nombre_tramite', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del tramite']) !!}
                                {!! Form::label('descripcion_tramite', 'Descripcion del tramite') !!}
                                {!! Form::text('descripcion_tramite', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripcion']) !!}
                                {!! Form::label('nombre_corta', 'Descripcion corta') !!}
                                {!! Form::text('descripcion_corta', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripcion corta']) !!}
                                {!! Form::label('categoria', 'Categoria') !!}
                                {!! Form::select('id_categoria', $categorias , null, ['placeholder'=>'Eliga una Categoria']) !!}
                                {!! Form::label('municipio', 'Municipio') !!}
                                {!! Form::select('id_municipio', $municipios, null, ['placeholder'=>'Elige un Municipio'] ) !!}
                                <br>
                                @error('nombre_tramite')

                                    <div class="alert alert-danger">{{ $message }}</div>

                                @enderror
                            
                            </div>

                           

                            {!! Form::submit('Crear tramite', ['class' => 'btn btn-primary']) !!}
    
                        {!! Form::close() !!}
    
                    </div>
           
                </div>
           
            </div>
        
        </div>

    </div>


@stop

