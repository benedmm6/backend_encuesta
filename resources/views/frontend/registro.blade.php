@extends('layouts.sitio')

@section('title', 'SEDEC | Registro')

@section('navbar')

@section('contenido')

    <div class="container">

        <section class="py-md-5">

            <div class="col-md-12">

                <div class="mw-100 col-auto text-center">

                    <div class="mx-auto align-self-center px-4 my-5">

                        <h1 class="display-4 fw-bold mb-4 text-primary text-center">Registrate</h1>

                    </div>

                </div>

            </div>

            {{-- FORMULARIO DE REGISTRO --}}

            <div class="col-md-8 mx-auto align-self-center p-5">

                {!! Form::open(['route' => 'home.usuarios.store']) !!}

                <div class="form-group">

                    {!! Form::label('Nombre', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su nombre completo']) !!}

                </div>


                <div class="form-group">

                    {!! Form::label('email', 'Correo Electronico') !!}

                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@correo.com']) !!}

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">

                        {!! Form::label('edad', 'Edad') !!}

                        {!! Form::number('edad', null, ['class' => 'form-control', 'placeholder' => 'Edad', 'min' => '1', 'max' => '80']) !!}

                    </div>

                </div>

                <div class="form-group">

                    {!! Form::label('estudio', 'Estudios') !!}

                    @php
                        
                        $estudios = [
                            'primaria' => 'Primaria',
                            'secundaria' => 'Secundaria',
                            'preparatoria' => 'Preparatoria',
                            'licenciatura' => 'Licenciatura',
                        ];
                        
                    @endphp

                    {!! Form::select('estudio', $estudios, null, ['class' => 'form-control', 'placeholder' => 'Selecciona un grado de estudios']) !!}

                </div>

                {!! Form::submit('Registrarme', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}

                <div class="mx-auto align-self-center px-4 my-5">

                    <a href="{{ route('loginu.index') }}" 
                        class="text-decoration-none">


                        <p class=" text-primary lead mb-4 text-center">Si ya te registraste participa con tu correo electronico

                            <i class="fas fa-arrow-right ms-2"></i>
                        </p>

                

                    </a>

                </div>

                @error('email')

                    <small class="text-danger">
                        
                        {{$message}}
                    
                    </small> 
                        
                @enderror

            </div>

        </section>

    </div>

@endsection

@section('footer')
