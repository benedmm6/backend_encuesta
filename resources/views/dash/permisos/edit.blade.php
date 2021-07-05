@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
<h1> Crear nuevo permiso</h1>
@stop
@section('content') 
<div class="card">
    @if (session('info'))
       <div class="aler alert-succes">
           <strong>{{session('info')}}</strong>
       </div>
           
       @endif
    <div class="card-body">
        
        {!! Form::model($permission,['route'=> ['admin.permisos.update',$permission], 'method' =>'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del permiso']) !!}

            @error('name')
            <small class="text-danger">
                {{$message}}
            </small>                
            @enderror
        </div>

        <h2 class="h3">Lista de roles</h2>

        @foreach ($roles as $rol)
        <div>
        <label>
            {!! Form::checkbox('roles[]', $rol->id, null, ['class'=>'mr-1']) !!}
        </label>
        </div>            
        @endforeach
        
        {!! Form::submit('Editar permiso', ['class'=>'btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Usuarios'); </script>
@stop