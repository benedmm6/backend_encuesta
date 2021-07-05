@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<h1> Crear nuevo usuario</h1>
@stop
@section('content') 
@if (session('info'))
       <div class="aler alert-succes">
           <strong>{{session('info')}}</strong>
       </div>
           
       @endif
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=> 'admin.usuarios.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nombre']) !!}
            {!! Form::label('email', 'email') !!}
            {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Email']) !!}
            {!! Form::label('password', 'password') !!}
            {!! Form::password('password', null, ['class'=>'form-control','placeholder'=>'Password']) !!}

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
            {{$rol->name}}
        </label>
        </div>            
        @endforeach
        
        {!! Form::submit('Crear usuario', ['class'=>'btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Users); </script>
@stop