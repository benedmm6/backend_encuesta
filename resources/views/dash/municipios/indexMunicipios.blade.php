@extends('adminlte::page')

@section('title', 'Municipios')

@section('content_header')

    <div class="container-fluid">
        
        <div class="row mb-2">
            
            <div class="col-sm-6">
                <h1>Administrador de Municipios</h1>
            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    
                    <li class="breadcrumb-item active">Municipios</li>
            
                </ol>

            </div>
        </div>
    
    </div>

@stop

@section('content')

    {{-- TABLA DEL CONTENIDO PRINCIPAL --}}

    <div class="row">
        
        <div class="col-12">

            <div class="card">
                
                <div class="card-header">
                    
                    <h3 class="card-title">Lista de Municipios</h3>

                    <div class="card-tools">
                        
                        <button class="btn btn-primary" data-toggle="modal" data-target="#agregarMunicipio"><i class="fas fa-fw fa-plus"></i>Agregar municipio</button>
                    
                    </div>
                
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-head-fixed">

                        <thead>
        
                            <tr>
                                <th>#</th>
                                
                                <th>Nombre</th>
                                
                                <th>Acciones</th>
                            
                            </tr>
                
                        </thead>

                        <tbody>

                            {{--    VALIDA QUE LA VARIABLE QUE VIENE DEL CONTROLADOR TENGA INFORMACIÓN
                                    EN CASO DE QUE NO TENGA MOSTRAR EL MENSAJE DE ABAJO                 --}}

                            @if (isset($municipio))

                            {{-- tabla de contenido  --}}

                            @else

                                <tr>

                                    <td>No hay registros de municipios</td>
                                </tr>

                            
                            @endif
                
                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    
    </div>

    {{-- MODAL DE AGREGAR USUARIO --}}

    <div class="modal fade" id="agregarMunicipio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
        <div class="modal-dialog" role="document">
        
            <div class="modal-content">
        
                <div class="modal-header">
        
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo municipio</h5>
        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        
                        <span aria-hidden="true">&times;</span>
        
                    </button>
        
                </div>
        
                <div class="modal-body">
        
                    FORMULARIO DE REGISTRO
        
                </div>
        
                <div class="modal-footer">
        
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
                    <button type="button" class="btn btn-primary">Guardar cambios</button>
        
                </div>
        
            </div>
        
        </div>
    
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Tramites'); </script>
@stop