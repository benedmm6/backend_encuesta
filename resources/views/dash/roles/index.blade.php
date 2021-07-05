@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')

       @if (session('info'))
       <div class="aler alert-succes">
           <strong>{{session('info')}}</strong>
       </div>
           
       @endif


    <div class="container-fluid">
        
        <div class="row mb-2">
            
            <div class="col-sm-6">
                <h1>Mostrar Rol</h1>
            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    
                    <li class="breadcrumb-item active">Roles</li>
            
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
                    
                    <h3 class="card-title">Lista de roles</h3>

                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{route('admin.roles.create')}}"><i class="fas fa-fw fa-plus"></i>Agregar Rol</a>
                    </div>
                
                </div>

                    <table class="table table-head-fixed">

                        <thead>
        
                            <tr>
                                <th>#</th>
                                
                                <th>Rol</th>                                
                            
                            </tr>
                
                        </thead>

                        <tbody>

                            @if ( $roles == null) 
                                <tr><td>no hay datos</td></tr>
                            @else
        
                                @foreach ($roles as $rol)
                                    <tr>
                                        <td>{{ $rol->id }}</td>
                                        <td>{{ $rol->name }}</td>
                                        <td>
                                        </td>
                                        <td width='10px'>
                                            <div class="btn-group">
                                                {{-- <button class="btn btn-primary"><i class="fas fa-eye"></i></button> --}}
                                                @can('admin.roles.edit')                                                    
                                                <a href="{{route('admin.roles.edit', $rol)}}"class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                @endcan
                                                @can('admin.roles.delete')                                                                       
                                                <form action="{{ route('admin.roles.destroy', $rol)}}" method="POST">
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