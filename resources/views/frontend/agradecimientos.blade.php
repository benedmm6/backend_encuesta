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

                    <a href="{{ route('home.categorias') }}">

                        <p class=" text-primary lead mb-4 text-center">Si, deseo seguir participando

                            <i class="fas fa-arrow-right ms-2"></i>

                        </p>

                    </a>

                </div>

            </div>

        </section>

    </div>

    {{-- @foreach ($encuesta as $item)
        {{ $item->agradecimiento_encuesta}}
    @endforeach --}}


@endsection

@section('footer')
