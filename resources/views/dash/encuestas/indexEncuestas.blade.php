@extends('adminlte::page')

@section('title', 'Encuestas')

@section('content_header')

    <div class="container-fluid">
        
        <div class="row mb-2">
            
            <div class="col-sm-6">
                <h1>Administrador de Encuestas</h1>
            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    
                    <li class="breadcrumb-item active">Encuestas</li>
            
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
                    
                    <h3 class="card-title">Lista de encuestas</h3>

                    <div class="card-tools">
                        
                        <a class="btn btn-primary" href="{{route('admin.encuestas.create')}}"><i class="fas fa-fw fa-plus"></i>Agregar Encuesta</a>
                    
                    </div>
                
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-head-fixed tablaEncuestas" >

                        <thead>
        
                            <tr>
                                <th>#</th>
                                
                                <th>Nombre de la encuesta</th>

                                <th>Vigencia</th>

                                <th>Categoria</th>

                                <th>Estado</th>
                                
                                <th>Acciones</th>
                            
                            </tr>
                
                        </thead>

                        <tbody>

                            @foreach ($encuestas as $encuesta)
                                    
                                <tr>

                                    <td>{{ ($loop->index)+1 }}</td>
                                
                                    <td>{{ $encuesta->nombre_encuesta }}</td>
                                
                                    <td>{{ $encuesta->fecha_vencimiento}}</td>
                                
                                    <td>

                                        {{$encuesta->nombre_categoria}}
                                    
                                    </td>
                                    @if ($encuesta->estado == 0)
                                        <td>
                                            <button class="btn btn-warning btn-xs btnActivar" idEncuesta="{{ $encuesta->id }}" estadoEncuesta="1">Borrador</button>
                                        </td>
                                    @else

                                        <td>
                                            <button class="btn btn-success btn-xs btnActivar" idEncuesta="{{ $encuesta->id }}" estadoEncuesta="0">Publicado</button>
                                        </td>
                                        
                                    @endif

                                    {{-- <td>{{ $encuesta->estado }}</td> --}}
                                    
                                    <td width='10px'>
                                    
                                        <div class="btn-group">
                                    
                                            {{-- <button class="btn btn-default"><i class="fas fa-eye"></i></button> --}}

                                            <a href="{{ url("encuestas/{$encuesta->id}/preguntas") }}" class="btn btn-primary"><i class="fas fa-question"></i></a>

                                            <a href="{{ route('admin.encuestas.edit', $encuesta->id) }}"class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                            <button class="btn btn-danger btnEliminar" idEncuesta="{{ $encuesta->id }}"><i class="fas fa-trash-alt"></i></button>


                                        </div>
                                            

                                    </td>

                                </tr>

                            @endforeach

                            
                
                        </tbody>

                    </table>
                     {{$encuestas->links()}}

                </div>

            </div>

        </div>
    
    </div>

@stop

@section('plugins.sweetalert2', true)

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

        @if(session('info') == 'create')
        
             Toast.fire('La encuesta se agrego correctamente', '', 'success')

        @endif

        $('.tablaEncuestas tbody').on('click', '.btnEliminar', function(){

                    var idEncuesta = $(this).attr("idEncuesta");

                    let _url = '{!! url("encuestas/'+idEncuesta+'") !!}';

                    let _token   = $('meta[name="csrf-token"]').attr('content');

                    Swal.fire({
                            title: '¿Está seguro de borrar la encuesta?',
                            text: '¡Si no lo está puede cancelar la acción!',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Cancelar',
                            confirmButtonText: 'Si, borrar la encuesta'
                        }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: _url,
                                type: 'DELETE',
                                data: {
                                _token: _token
                                },
                                success: function(response) {
                                    location.reload();
                                    Toast.fire('La encuesta se elimino correctamente', '', 'success')
                                }
                            });
                        } 
            });
        });

        $('.tablaEncuestas tbody').on('click', '.btnActivar', function(){
            // console.log('activando');

            var idEncuesta = $(this).attr("idEncuesta");

            var estadoEncuesta = $(this).attr("estadoEncuesta");

            let _url = '{!! url("encuestas/'+idEncuesta+'/estado") !!}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url : _url,
                type: "POST",
                data:{
                    estado: estadoEncuesta,
                },
                dataType: "json",
                success: function(response){
                    location.reload();
                    Toast.fire('El estado de la encuesta se actualizo correctamente', '', 'success');
                }
                    
            });
            if(estadoEncuesta == 0){

            $(this).removeClass('btn-success');
            $(this).addClass('btn-warning');
            $(this).html('Borrador');
            $(this).attr('estadoUsuario', 1);

            }else{

            $(this).addClass('btn-success');
            $(this).removeClass('btn-warning');
            $(this).html('Publicado');
            $(this).attr('estadoUsuario', 0);
            }
        });
    </script>

@stop