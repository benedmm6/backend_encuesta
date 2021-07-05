@extends('layouts.sitio')

@section('title',  $categoria->nombre_categoria )

@section('navbar')

@section('contenido')

    @if ($categoria->id == 2)

        <h2 class="display-4 fw-bold text-primary">Autoridades Municipales de Tabasco<span class="text-dark">.</span></h2>
            
        <p class="lead mb-5">Seleccione un municipio</p>

        <div class="row gx-5">

            @foreach ($municipios as $municipio)

            <div class="col-md-2 py-4 ">
                <a href="{{ route('home.encuesta.index',['categoria' => $categoria->id,'municipio' => $municipio->id]) }}" class="text-decoration-none">
                  <img src="http://encuestas.test/storage/{{ $municipio->icono}}" class="img-fluid">
                  <div class="d-flex">
                  </div>
                  <p class="lead text-dark">{{ $municipio->nombre_municipio }}</p>
                </a>
            </div>
                
            @endforeach

        </div>
        
    @endif

    
@endsection

@section('footer')