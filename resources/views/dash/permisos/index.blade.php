@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')

       @if (session('info'))
       <div class="aler alert-succes">
           <strong>{{session('info')}}</strong>
       </div>
           
       @endif


    <div class="container-fluid">
        
        <div class="row mb-2">
            
            <div class="col-sm-6">
                <h1>Mostrar Permisos</h1>
            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    
                    <li class="breadcrumb-item active">Permisos</li>
            
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
                    
                    <h3 class="card-title">Lista de Permisos</h3>

                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{route('admin.permisos.create')}}"><i class="fas fa-fw fa-plus"></i>Agregar un permiso</a>
                    </div>
                
                </div>

                    <table class="table table-head-fixed">

                        <thead>
        
                            <tr>
                                <th>#</th>
                                
                                <th>Permiso</th> 
                                
                                <th>Descripcion</th>
                            
                            </tr>
                
                        </thead>

                        <tbody>

                            @if ( $permission == null) 
                                <tr><td>no hay datos</td></tr>
                            @else
        
                                @foreach ($permission as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td>
                                        </td>
                                        <td width='10px'>
                                            <div class="btn-group">
                                                {{-- <button class="btn btn-primary"><i class="fas fa-eye"></i></button> --}}
                                                @can('admin.permisos.editar')                                                    
                                                <a href="{{route('admin.permisos.edit', $permission->name)}}"class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                @endcan
                                                @can('admin.permisos.destroy')                                                                       
                                                <form action="{{ route('admin.permisos.destroy', $permission)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form> 
                                                @endcan         

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