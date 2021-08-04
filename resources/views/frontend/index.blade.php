@extends('layouts.sitio')

@section('title', 'SEDEC | Inicio')

@section('navbar')

@section('contenido')

    @php

    $inicio = [
        'titulo' => 'Primera Campaña de Opinión Ciudadana sobre Trámites Gubernamentales',
        'descripcion' => "Bienvenido a la <strong>Primera Campaña de Opinión Ciudadana sobre Trámites Gubernamentales 
            </strong>del Estado de Tabasco, con tu participación nos ayudarás a identificar los trámites que impactan en 
        la población, por la complejidad de los mismos al momento de realizarlos, así como a combatir 
        los posibles actos proclives de corrupción .
",
    ];

    @endphp
     <link rel="stylesheet" href="{!!asset('css/style.css') !!}">

    <div class="container">

        {{-- SECCION INICIAL --}}

        <section class="py-md-5">

            <div class="col-md-12">
    
                <div class="mw-100 col-auto text-center">
    
                    <div class="mx-auto align-self-center px-4 my-5">
    
                        <h2 class="text-primary text-center">Primera Campaña de Opinión Ciudadana sobre Trámites Gubernamentales</h2>
    
                        <p class="lead mb-4 text-center">{!! $inicio['descripcion'] !!}</p>

                        <p class="lead mb-4 text-center">(Favor de dar click en el siguiente botón para comenzar el proceso)
                        </p>
    
                        <a href="{{ route('home.categorias') }}" class="btn btn-primary mb-5">Encuestas</a>       
                
                    </div>
    
                </div>
            
            </div>
    
        </section>
        
        {{-- LOGOTIPOS --}}

        <section class="py-md-5">

            <div class="col-md-12">

                <div class="mw-100 col-auto text-center">

                    <div class="mx-auto align-self-center px-4 my-5">

                        <h2 class="text-primary text-center">Dependencias participantes</h2> 

                        <br>

                        <a href="{{ asset('storage/firmas/convocatoria.pdf') }}"
                            class="btn btn-primary">

                            Descarga la convocatoria aquí


                        </a>


                    </div>

                </div>

            </div>

            <div class="m-0 vh-100 row justify-content-center align-items-center">


                <div class="col-auto col-lg-4 col-md-4 col-sm-12 p-5 text-center">    
    
                        <img src="{{ asset('storage/firmas/segob.png') }}" style=" width: 60%;" class="rounded img-fluid">

                </div>
                
                <div class="col-auto col-lg-4 col-md-4 col-sm-8 p-5 text-center">
    
                        <img src="{{ asset('storage/firmas/finanzas.png') }}" style=" width: 80%;" class="rounded img-fluid">
    
                </div>
                    
                <div class="col-auto col-lg-4 col-md-4 col-sm-8 p-5 text-center">
    
                    <img src="{{ asset('storage/firmas/sedec.png') }}" style=" width: 100%;" class="rounded img-fluid">
    
                </div>
    
                <div class="col-auto col-lg-4 col-md-4 col-sm-8 p-5 text-center">
    
                    <img src="{{ asset('storage/firmas/logo-web.png') }}" style=" width: 80%;" class="rounded img-fluid">
    
                </div>
    
                <div class="col-auto col-lg-4 col-md-4 col-sm-8 p-5 text-center">
    
                    <img src="{{ asset('storage/firmas/funcion-publica.png') }}" style=" width: 100%;" class="rounded img-fluid">
    
                </div>
    
                <div class="col-auto col-lg-4 col-md-4 col-sm-8 p-5 text-center">
    
                    <img src="{{ asset('storage/firmas/saig2.png') }}" style=" width: 80%;" class="rounded img-fluid">
    
                </div>

                <div class="col-auto col-lg-4 col-md-4 col-sm-8 p-5 text-center">

    
                        <img src="{{ asset('storage/firmas/cemer.png') }}" style=" width: 70%;"class="rounded img-fluid">
    
                </div>

            </div>

        </section>

        {{-- END LOGOTIPOS --}}

    </div>


@endsection

@section('footer')
