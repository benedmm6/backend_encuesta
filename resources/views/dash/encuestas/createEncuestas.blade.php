@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')

    <div class="container-fluid">
            
        <div class="row mb-2">
            
            <div class="col-sm-6">

                <h1>Crear una encuesta</h1>

            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="{{ route('dash')}}"><i class="fa fa-dashboard"></i>Inicio</a></li>
                    
                    <li class="breadcrumb-item active">

                        <a href="{{ route('admin.encuestas.index')}}"><i class="fa fa-dashboard"></i>Encuestas</a>

                    </li>

                    <li class="breadcrumb-item active">Crear encuesta</li>
            
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

                        <div class="form-group">

                            <label for="">Titulo de la encuesta</label>

                            <input type="text" class="form-control form-control-lg" placeholder="Titulo de la encuesta">

                        </div>

                        <div class="form-group">

                            <label for="">Descripción de la encuesta</label>

                            <textarea class="form-control" rows="3" placeholder="Descripción de la encuesta"></textarea>

                        </div>

                        <div class="form-group">

                            <label for="">Instrucciones</label>

                            <textarea class="form-control" rows="3" placeholder="Instrucciones de la encuesta"></textarea>

                        </div>
    
                    </div>
           
                </div>

               {{-- AREA DE LAS PREGUNTAS --}}

                <div class="row">

                    <div class="col-md-12">

                        <div class="callout callout-info">
                            <h5>Lugar de la pregunta</h5>
          
                            <p>Follow the steps to continue to payment.</p>
                        </div>

                    </div>

                </div>

                {{-- HERRAMIENTAS --}}

                <div class="row">
                    <button type="button" class="btn btn-primary btn-block btn-flat">Agregar pregunta</button>
                </div>

            </div>
        
        </div>

    </div>


@stop
