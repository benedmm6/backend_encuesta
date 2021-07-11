@extends('layouts.sitio')

@section('title', 'SEDEC | Iniciar Sesión')

@section('navbar')

@section('contenido')

    <div class="container">

        <section class="py-md-5">

            <div class="col-md-12">

                <div class="mw-100 col-auto text-center">

                    <div class="mx-auto align-self-center px-4 my-5">

                        <h1 class="display-4 fw-bold mb-4 text-primary text-center">Iniciar Sesión</h1>

                    </div>

                </div>

            </div>

            {{-- FORMULARIO DE REGISTRO --}}

            <div class="col-md-8 mx-auto align-self-center p-5">
                {!! Form::open(['route' => 'loginu.store']) !!}

                <div class="form-group">

                    {!! Form::label('email', 'Correo Electronico') !!}

                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@correo.gmail.com']) !!}

                    @error('email')

                        <small class="text-danger">

                            {{ $message }}

                        </small>

                    @enderror

                </div>

                {!! Form::submit('Iniciar Sesión', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}

            </div>

        </section>

    </div>


@endsection

@section('footer')