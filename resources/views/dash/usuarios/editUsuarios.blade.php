@extends('adminlte::page')

@section('title', 'Tramites')

@section('content_header')
<div class="container-fluid">
            
    <div class="row mb-2">
        
        <div class="col-sm-6">

            <h1>Asignar un rol</h1>

        </div>
        
        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item"><a href="{{ route('dash')}}"><i class="fa fa-dashboard"></i>Inicio</a></li>
                
                <li class="breadcrumb-item active">

                    <a href="{{ route('admin.usuarios.index')}}"><i class="fa fa-dashboard"></i>Usuarios</a>

                </li>

                <li class="breadcrumb-item active">Asignar un rol</li>
        
            </ol>

        </div>
    </div>

</div
@stop

@section('content')
    <div class="container-fluid">

        <div class="row">
    
            <div class="col-12">

                @if (session('info'))

                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                    
                @endif
        
                <div class="card">

        
                    <div class="card-header">
                        
                        <h3 class="card-title">Seleccionar un rol</h3>

                    </div>

                    <div class="card-body">
                        <p class="h5">Nombre:</p>
                        <p class="form-control">{{$usuario->name}}</p>
                        <h2 class="h5">Listado de roles</h2>
                        {!! Form::model($usuario, ['route' => ['admin.usuarios.update', $usuario], 'method' => 'put']) !!}
                        @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                                {{$role->name}}
                            </label>
                        </div>
                            
                        @endforeach
                        {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}

                    {!! Form::close() !!}

                    </div>
        
                </div>
        
            </div>
        
        </div>

    </div>
@stop
