@extends('adminlte::page')

@section('title', 'Tramites')

@section('content_header')

    <div class="container-fluid">
        
        <div class="row mb-2">
            
            <div class="col-sm-6">
                <h1>Administrador de Tramites</h1>
            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    
                    <li class="breadcrumb-item active">Tramites</li>
            
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
                    
                    <h3 class="card-title">Lista de Tramites</h3>

                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{route('admin.tramites.create')}}"><i class="fas fa-fw fa-plus"></i>Agregar Tramite</a>
                    </div>
                
                </div>

                <div class="card-body table-responsive">
                    <div class="card-header">
                        <h3 class="card-title">Busqueda de usuarios</h3>
                        <Form action="{{route('admin.tramites.index')}} " method="GET">
                            <div class="form-row">
                                <div class="col-sm-4 my-1">
                                    <input type="text" class="form-control" name="busqueda">
                                </div>
                                <div class="col-auto my-1">
                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                </div>
                            </div>
                        </Form>
                    </div>

                    <table class="table table-head-fixed">

                        <thead>
        
                            <tr>
                                <th>#</th>
                                
                                <th>Nombre</th>
                                
                                <th>Descripcion </th>

                                <th>Descripcion corta</th>

                                <th>categoria</th>

                                <th>municipio</th>
                            
                            </tr>
                
                        </thead>

                        <tbody>

                            @if ( $tramites == null) 
                                <tr><td>no hay datos</td></tr>
                            @else
        
                                @foreach ($tramites as $tramite)
                                    <tr>
                                        <td>{{ $tramite->id }}</td>
                                        <td>{{ $tramite->nombre_tramite }}</td>
                                        <td>{{ $tramite->descripcion_tramite }}</td>
                                        <td>{{ $tramite->descripcion_corta }}</td>
                                        <td>
                                            @foreach($categorias as $categoria)
                                            @if($categoria->id === $tramite->id_categoria)
                                            {!! $categoria->nombre_categoria !!}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($municipios as $municipio)
                                            @if($municipio->id === $tramite->id_municipio)
                                            {!! $municipio->nombre_municipio !!}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td width='10px'>
                                            <div class="btn-group">
                                                {{-- <button class="btn btn-primary"><i class="fas fa-eye"></i></button> --}}
                                                <a href="{{route('admin.tramites.edit', $tramite->id)}}"class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.tramites.destroy', $tramite->id)}}" method="POST">
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
                    {{$tramites->links()}}
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