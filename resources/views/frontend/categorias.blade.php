@extends('layouts.sitio')

@section('title', 'Opinión Publica | Categorias')

@section('navbar')

@section('contenido')
    
    <h2 class="display-4 fw-bold text-primary">Categorias<span class="text-dark">.</span></h2>
        
        <p class="lead mb-5">Seleccione una categoria de su interes</p>
        
        <div class="row gx-5">

            @foreach ($categorias as $categoria)


                <div class="col-lg-4 py-4">
            
                    <a href="{{ route('home.categorias.show', ['id' => $categoria->id ]) }}" class="text-decoration-none">
            
                        <img src="http://encuestas.test/storage/firmas/escudo_de_armas.png" class="img-fluid mb-4">
            
                        <div class="d-flex mb-4">
                            
                            <p class="flex-grow-1 text-dark mb-0">Categoria</p>
            
                        </div>
                        
                        <p class="lead text-primary fw-bold mb-4">{!! $categoria->nombre_categoria !!}</p>
                        
                        <p class="text-secondary fw-bold">Participar <i class="fas fa-arrow-right ms-2"></i></p>
                    
                    </a>
                
                </div>


                
            @endforeach

            
        </div>
@endsection

@section('footer')

