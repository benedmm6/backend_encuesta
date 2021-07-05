@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

       @if (session('info'))
       <div class="aler alert-succes">
           <strong>{{session('info')}}</strong>
       </div>
           
       @endif


    <div class="container-fluid">
        
        <div class="row mb-2">
            
            <div class="col-sm-6">
                <h1>Administrador de usuarios</h1>
            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    
                    <li class="breadcrumb-item active">Usuarios</li>
            
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
                    
                    <h3 class="card-title">Lista de Usuarios</h3>

                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{route('admin.usuarios.create')}}"><i class="fas fa-fw fa-plus"></i>Agregar usuario</a>
                    </div>
                
                </div>

                <div class="card-body table-responsive">
                    <div class="card-header">
                        <h3 class="card-title">Busqueda de usuarios</h3>
                        <Form action="{{route('admin.usuarios.index')}} " method="GET">
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
                                
                                <th>Email</th>

                            
                            </tr>
                
                        </thead>

                        <tbody>

                            @if ( $usuarios == null) 
                                <tr><td>no hay datos</td></tr>
                            @else
        
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                        </td>
                                        <td width='10px'>
                                            <div class="btn-group">
                                                {{-- <button class="btn btn-primary"><i class="fas fa-eye"></i></button> --}}
                                                <a href="{{route('admin.usuarios.edit', $usuario)}}"class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.usuarios.destroy', $usuario->id)}}" method="POST">
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
    <script> console.log('Usuarios'); </script>
@stop