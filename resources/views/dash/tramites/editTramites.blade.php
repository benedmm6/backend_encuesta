@extends('adminlte::page')

@section('title', 'Tramites')

@section('content_header')
<div class="container-fluid">
            
    <div class="row mb-2">
        
        <div class="col-sm-6">

            <h1>Editar tramites</h1>

        </div>
        
        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item"><a href="{{ route('dash')}}"><i class="fa fa-dashboard"></i>Inicio</a></li>
                
                <li class="breadcrumb-item active">

                    <a href="{{ route('admin.tramites.index')}}"><i class="fa fa-dashboard"></i>Tramite</a>

                </li>

                <li class="breadcrumb-item active">Editar tramite</li>
        
            </ol>

        </div>
    </div>

</div
@stop

@section('content')
    <div class="container-fluid">

        <div class="row">
    
            <div class="col-12">

                @if (session('info'))

                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                    
                @endif
        
                <div class="card">
        
                    <div class="card-header">
                        
                        <h3 class="card-title">Modificar tramite</h3>

                    </div>

                    <div class="card-body">

                        {!! Form::model($tramite, ['route' => ['admin.tramites.update', $tramite], 'method' => 'put']) !!}

                            <div class="form-group">
                                {!! Form::label('nombre_tramite', 'Nombre del tramite') !!}
                                {!! Form::text('nombre_tramite', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del tramite']) !!}
                                {!! Form::label('descripcion_tramite', 'Descripcion del tramite') !!}
                                {!! Form::text('descripcion_tramite', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripcion']) !!}
                                {!! Form::label('nombre_corta', 'Descripcion corta') !!}
                                {!! Form::text('descripcion_corta', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripcion corta']) !!}
                                {!! Form::label('categoria', 'Categoria') !!}
                                {!! Form::select('id_categoria', $categorias ,null, ['placeholder'=>'Eliga una Categoria']) !!}
                                {!! Form::label('municipio', 'Municipio') !!}
                                {!! Form::select('id_municipio', $municipios, null, ['placeholder'=>'Elige un Municipio'] ) !!}
                                <br>
                                @error('nombre_tramite')

                                    <div class="alert alert-danger">{{ $message }}</div>

                                @enderror
                            
                            </div>

                            {!! Form::submit('Actualizar tramite', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}

                    </div>
        
                </div>
        
            </div>
        
        </div>

    </div>
@stop
