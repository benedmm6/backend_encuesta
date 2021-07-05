@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
<h1> Crear nuevo Permiso</h1>
@stop
@section('content') 
@if (session('info'))
       <div class="aler alert-succes">
           <strong>{{session('info')}}</strong>
       </div>
           
       @endif
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=> 'admin.permisos.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del permiso']) !!}
            {!! Form::label('description', 'Descripcion') !!}
            {!! Form::text('descrption', null, ['class'=>'form-control','placeholder'=>'Ingrese una breve descripcion']) !!}

            @error('name')
            <small class="text-danger">
                {{$message}}
            </small>                
            @enderror
        </div>

        <h2 class="h3">Lista de permisos</h2>

        @foreach ($roles as $rol)
        <div>
        <label>
            {!! Form::checkbox('roles[]', $rol->id, null, ['class'=>'mr-1']) !!}
            {{$rol->name}}
        </label>
        </div>            
        @endforeach
        
        {!! Form::submit('Crear Permiso', ['class'=>'btn-primary']) !!}
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