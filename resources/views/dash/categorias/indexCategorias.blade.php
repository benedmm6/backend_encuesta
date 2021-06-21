@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')

    <div class="container-fluid">
        
        <div class="row mb-2">
            
            <div class="col-sm-6">
                <h1>Administrador de Categorias</h1>
            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    
                    <li class="breadcrumb-item active">Categorias</li>
            
                </ol>

            </div>
        </div>
    
    </div>

@stop

@section('content')

    <div class="row">
        
        <div class="col-12">

            @if (session('info'))

                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                    
            @endif

            <div class="card">
                
                <div class="card-header">
                    
                    <h3 class="card-title">Lista de Categorias</h3>

                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{route('admin.categorias.create')}}"><i class="fas fa-fw fa-plus"></i>Agregar categoria</a>
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

                            @if ( $categorias == null) 
                                <tr><td>no hay datos</td></tr>
                            @else
        
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{ ($loop->index)+1 }}</td>
                                        <td>{{ $categoria->nombre_categoria }}</td>
                                        <td width='10px'>
                                            <div class="btn-group">
                                                {{-- <button class="btn btn-primary"><i class="fas fa-eye"></i></button> --}}
                                                <a href="{{route('admin.categorias.edit', $categoria->id)}}"class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.categorias.destroy', $categoria->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>          

                                            </div>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                
                            @endif
                
                        </tbody>

                    </table>

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