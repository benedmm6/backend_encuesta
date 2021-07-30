@extends('adminlte::page')

@section('title', 'Tramites')

@section('content_header')

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Reporte de encuesta municipal</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

                    <li class="breadcrumb-item active">Reporte Municipal</li>

                </ol>

            </div>
        </div>

    </div>
@stop

@section('content')
    <div class="container-fluid">

        <h5 class="mb-2">Datos generales</h5>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total de Participantes</span>
                        <span class="info-box-number">{{ count($participaciones) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

        <h5 class="mb-2">Resultados de las preguntas</h5>

        <div class="row">

            <div class="col-md-12 col-12">

                <div class="card collapsed-card">

                    <div class="card-header border-0">

                        <h3 class="card-title">¿Cuál es el trámite más engorroso?</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Nombre del participante</th>
                                    <th>Correo Electronico</th>
                                    <th>Respuesta</th>
                                    <th>Motivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pregunta1 as $pregunta)

                                    <tr>
                                        <td>
                                            {{ $pregunta->nombre }}
                                        </td>
                                        <td>{{ $pregunta->correo }}</td>
                                        <td>
                                            {{ $pregunta->respuesta_texto }}
                                        </td>
                                        <td>{{ $pregunta->opcional }}</td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-md-12 col-12">

                <div class="card collapsed-card">


                    <div class="card-header">

                        <h3 class="card-title">¿Conoce el Portal de Trámites Tabasco?</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body">

                        <canvas id="myChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 100px;"
                            width="2000" height="500" class="chartjs-render-monitor"></canvas>

                    </div>
                </div>

            </div>

            <div class="col-md-12 col-12">

                <div class="card collapsed-card">

                    <div class="card-header border-0">

                        <h3 class="card-title">¿Que trámite le gustaría se realizara en línea?</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body table-responsive p-0">

                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Nombre del participante</th>
                                    <th>Correo Electronico</th>
                                    <th>Trámites</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pregunta3 as $item)

                                    <tr>
                                        <td>
                                            {{ $item[0]->nombre }}
                                        </td>
                                        <td>{{ $item[0]->correo }}</td>
                                        <td>
                                            @foreach ($tramites as $tramite)
                                                @if ($tramite->id_participante == $item[0]->id_participante)

                                                    <ul>{{ $tramite->respuesta_texto }}</ul>

                                                @endif

                                            @endforeach
                                        </td>
                                    </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-md-12 col-12">

                <div class="card collapsed-card">

                    <div class="card-header border-0">

                        <h3 class="card-title">¿En que trámite te han pedido soborno?</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>


                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Nombre del participante</th>
                                    <th>Correo Electronico</th>
                                    <th>Respuesta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pregunta4 as $pregunta4)

                                    <tr>
                                        <td>
                                            {{ $pregunta4->nombre }}
                                        </td>
                                        <td>{{ $pregunta4->correo }}</td>
                                        <td>
                                            {{ $pregunta4->respuesta_texto }}
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-md-12 col-12">

                <div class="card collapsed-card">

                    <div class="card-header border-0">

                        <h3 class="card-title">Comentarios</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Nombre del participante</th>
                                    <th>Correo Electronico</th>
                                    <th>Comentario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pregunta5 as $pregunta)

                                    <tr>
                                        <td>
                                            {{ $pregunta->nombre }}
                                        </td>
                                        <td>{{ $pregunta->correo }}</td>
                                        <td>
                                            {{ $pregunta->respuesta_texto }}
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>



        </div>

    </div>
@stop

@php

    if(isset($pregunta2[0]->total)){
        $valor1 = $pregunta2[0]->total;
    }else{
        $valor1 = 0;
    }

    if(isset($pregunta2[1]->total)){
        $valo2 = $pregunta2[1]->total;
    }else{
        $valor2 = 0;
    }

@endphp


@section('js')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');

        let valor1 = '{!! $valor1 !!}';

        let valor2 = '{!! $valor2 !!}';


        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Si', 'No'],
                datasets: [{
                    label: '# of Votes',
                    data: [valor1, valor2],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            },
            option: {
                maintainAspectRatio: false,
                responsive: true,
            }
        });
    </script>
@stop

