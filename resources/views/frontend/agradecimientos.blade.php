@extends('layouts.sitio')

@section('title', 'Agradecimientos')

@section('navbar')

@section('contenido')

    <div class="container">

        <section class="py-md-5">

            <div class="col-md-12">

                <div class="mw-100 col-auto text-center">

                    <div class="mx-auto align-self-center p
                        x-4 my-5">

                        <p class="lead mb-4 text-center">{{ $encuesta[0]->agradecimiento_encuesta }}</p>

                        <h1 class="fw-bold mb-4 text-primary text-center">Gracias</h1>

                        <a class="btn btn-primary" href="{{route('home.logout')}}" >Finalizar</a>


                    </div>

                    <p class="lead mb-4 text-center">¿Deseas seguir participando?</p>
                    
                    @if ($encuestas[0]->id_categoria != 2)

                    <a href="{{ route('home.encuesta.index', ['categoria' => $encuestas[0]->id_categoria, 'encuesta' => $encuestas[0]->id, 'municipio']) }}">

                        <p class=" text-primary lead mb-4 text-center">Si, deseo participar en la encuesta estatal

                            <i class="fas fa-arrow-right ms-2"></i>

                        </p>

                    </a>
                    
                    <a href="{{ route('home.categorias.show', ['id' => '2']) }}">

                        <p class=" text-primary lead mb-4 text-center">Si, deseo participar en la encuesta municipal

                            <i class="fas fa-arrow-right ms-2"></i>

                        </p>

                    </a>
                        
                    @else

                    <a href="{{ route('home.categorias') }}">

                        <p class=" text-primary lead mb-4 text-center">Si, deseo seguir participando en la encuesta municipal

                            <i class="fas fa-arrow-right ms-2"></i>

                        </p>

                    </a>
                        
                    @endif

                </div>

            </div>

        </section>

    </div>


@endsection

@section('footer')
