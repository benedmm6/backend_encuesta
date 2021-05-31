@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

    <div class="container-fluid">
            
        <div class="row mb-2">
            
            <div class="col-sm-6">

                <h1>Nueva categoria</h1>

            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="{{ route('dash')}}"><i class="fa fa-dashboard"></i>Inicio</a></li>
                    
                    <li class="breadcrumb-item active">

                        <a href="{{ route('admin.categorias.index')}}"><i class="fa fa-dashboard"></i>Categorias</a>

                    </li>

                    <li class="breadcrumb-item active">Nueva Categoria</li>
            
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
                        
                        <h3 class="card-title">Agregar nueva categoria</h3>
    
                    </div>
    
                    <div class="card-body">
    
                        {!! Form::open(['route' => 'admin.categorias.store']) !!}

                            <div class="form-group">
                                {!! Form::label('nombre_categoria', 'Nombre de la categoria') !!}
                                {!! Form::text('nombre_categoria', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}
                                <br>
                                @error('nombre_categoria')

                                    <div class="alert alert-danger">{{ $message }}</div>

                                @enderror
                            
                            </div>

                           

                            {!! Form::submit('Crear categoria', ['class' => 'btn btn-primary']) !!}
    
                        {!! Form::close() !!}
    
                    </div>
           
                </div>
           
            </div>
        
        </div>

    </div>


@stop

