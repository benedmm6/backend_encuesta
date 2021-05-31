@extends('adminlte::page')

@section('title', 'Municipios')

@section('content_header')

    <div class="container-fluid">
            
        <div class="row mb-2">
            
            <div class="col-sm-6">

                <h1>Nueva Municipio</h1>

            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="{{ route('dash')}}"><i class="fa fa-dashboard"></i>Inicio</a></li>
                    
                    <li class="breadcrumb-item active">

                        <a href="{{ route('admin.municipios.index')}}"><i class="fa fa-dashboard"></i>Municipios</a>

                    </li>

                    <li class="breadcrumb-item active">Nuevo Municipio</li>
            
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
                        
                        <h3 class="card-title">Agregar nuevo municipio</h3>
    
                    </div>
    
                    <div class="card-body">
    
                        
    
                    </div>
           
                </div>
           
            </div>
        
        </div>

    </div>


@stop
