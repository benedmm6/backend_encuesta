@extends('layouts.sitio')

@section('title', 'Opinión Publica | Categorias')

@section('navbar')

@section('contenido')
    
    <h2 class="display-4 fw-bold text-primary">Encuestas<span class="text-dark">.</span></h2>
        
        <p class="lead mb-5">Seleccione una encuesta</p>
        
        <div class="row gx-5">

            <div class="col-md-12">

                @foreach ($encuestas as $encuesta)

                    <div class="card">
                        
                        <div class="card-body">
                        
                            <h5 class="card-title text-primary">{{ $encuesta->nombre_encuesta}}</h5>
                        
                            <p class="card-text">{{ $encuesta->descripcion_encuesta}}</p>

                            <a class="text-secondary fw-bold" href="{{ route('home.encuesta.index', ['categoria' => $idCategoria, 'municipio' => $idMunicipio, 'encuesta' => $encuesta->id]) }}">Contestar <i class="fas fa-arrow-right ms-2"></i></a>
                        
                        </div>
                    
                    </div>

                @endforeach

            </div>
            
        </div>

@endsection

@section('footer')