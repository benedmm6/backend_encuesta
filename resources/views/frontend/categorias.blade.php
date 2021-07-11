@extends('layouts.sitio')

@section('title', 'Opinión Publica | Categorias')

@section('navbar')

@section('contenido')

    <div class="container">

        <div class="col-md-12 py-md-5">

            <div class="mw-100 col-auto text-center">

                <div class="mx-auto align-self-center px-4 my-5">

                    <h1 class="display-4 fw-bold mb-4 text-primary text-center">Ayúdanos a Mejorar
                    </h1>

                    <p class="lead mb-4 text-center">Selecciona el ámbito de gobierno del cual deseas opinar.</p>

                </div>

            </div>

        </div>

        <div class="row vh-100 justify-content-around align-items-center py-md-5">

            @foreach ($categorias as $categoria)

                @if ($categoria->id == 2)

                    <div class="col-md-6">

                        <img src="{{ asset('storage/firmas/escudo_de_armas.png') }}" style="width:20%"
                            class="img-fluid mx-auto d-block">

                        <div class="mx-auto align-self-center px-4 my-5">

                            <p class="lead text-primary fw-bold mb-4 text-center">{!! $categoria->nombre_categoria !!}</p>

                            <a href="{{ route('home.categorias.show', ['id' => $categoria->id]) }}"
                                class="text-decoration-none">

                                <p class="text-secondary fw-bold text-center">Participar <i
                                        class="fas fa-arrow-right ms-2"></i>
                                </p>

                            </a>

                        </div>

                    </div>

                @else

                    <div class="col-md-6">

                        <img src="{{ asset('storage/firmas/escudo_de_armas.png') }}" style="width:20%"
                            class="img-fluid mx-auto d-block">

                        <div class="mx-auto align-self-center px-4 my-5">

                            <p class="lead text-primary fw-bold mb-4 text-center">{!! $categoria->nombre_categoria !!}</p>

                            @php
                                $idEncuesta;
                            @endphp

                            @foreach ($encuestas as $key => $item)

                                @if ($categoria->id == $item->id_categoria)

                                    @php
                                        $idEncuesta = $key;
                                    @endphp
                                    
                                @endif
                                
                            @endforeach

                            <a href="{{ route('home.encuesta.index', ['categoria' => $categoria->id, 'encuesta' => $encuestas[$idEncuesta]->id, 'municipio']) }}" 
                            class="text-decoration-none">

                                <p class="text-secondary fw-bold text-center">
                                    
                                    Participar 
                                    
                                    <i class="fas fa-arrow-right ms-2"></i>
                                        
                                </p>

                            </a>

                        </div>

                    </div>

                @endif

            @endforeach

        </div>

    </div>


@endsection

@section('footer')
