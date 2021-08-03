@extends('adminlte::page')

@section('title', 'Reporte Estatal')

@section('content_header')

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Reporte de encuesta estatal</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

                    <li class="breadcrumb-item active">Reporte estatal</li>

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

            {{-- PREGUNTA NÚMERO 1 --}}

            <div class="col-md-12 col-12">

                <div class="card">

                    <div class="card-header border-0">

                        <h3 class="card-title">¿Cuál es el trámite más engorroso?</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Genero</th>
                                    <th>Ocupación</th>
                                    <th>Edad</th>
                                    <th>Grado de estudios</th>
                                    <th>Respuesta</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pregunta1 as $pregunta)

                                    <tr>
                                        <td>{{ $pregunta->nombre }}</td>
                                        <td>{{ $pregunta->email }}</td>
                                        <td>{{ $pregunta->edad }}</td>
                                        <td>{{ $pregunta->estudio }}</td>
                                        <td>{{ $pregunta->respuesta_texto }}</td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>

                    </div>

                    <div class="card-footer clearfix">

                        {{ $pregunta1->links() }}

                    </div>
                </div>

            </div>

            {{-- MOTIVOS --}}

            <div class="col-md-12 col-12">

                <div class="card">

                    <div class="card-header">

                        <h3 class="card-title">Motivos</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="col-md-6 col-12">

                            <canvas id="motivos" width="80px" height="80px" style="height: 80px; width: 80px;"></canvas>

                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            {{-- pregunta2  --}}

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
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 80%; display: block; width: 100px;"
                            width="2000" height="500" class="chartjs-render-monitor"></canvas>

                    </div>
                </div>

            </div>

            {{-- pregunta 3 --}}

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
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>Genero</th>
                                    <th>Edad</th>
                                    <th>Estudio</th>
                                    <th>Respuesta Texto</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pregunta3 as $pregunta)

                                    @php
                                        if($pregunta->estudio == '0'){
                                            $estudio = 'Dato no proporcionado';
                                        }else{
                                            $estudio = $pregunta->estudio;
                                        }
                                    @endphp

                                    @if ($pregunta->id == 1)

                                        <tr>
                                            <td>{{ ($loop->index)+1 }}</td>
                                            <td>{{ $pregunta->nombre }}</td>
                                            <td>Dato no proporcionado</td>
                                            <td>{{ $pregunta->edad }}</td>
                                            <td>{{ $estudio }}</td>
                                            <td>{{ $pregunta->respuesta_texto }}</td>
                                        </tr>
                                        
                                    @else

                                    <tr>
                                        <td>{{ ($loop->index)+1 }}</td>
                                        <td>Usuario Anónimo</td>
                                        <td>{{ $pregunta->nombre }}</td>
                                        <td>{{ $pregunta->edad }}</td>
                                        <td>{{ $estudio }}</td>
                                        <td>{{ $pregunta->respuesta_texto }}</td>
                                    </tr>
                                        
                                    @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">

                        {{ $pregunta3->links() }}

                    </div>
                </div>

            </div>

            {{-- PREGUNTA 4 --}}

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
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>Genero</th>
                                    <th>Edad</th>
                                    <th>Estudio</th>
                                    <th>Respuesta Texto</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pregunta4 as $pregunta)

                                    @php
                                        if($pregunta->estudio == '0'){
                                            $estudio = 'Dato no proporcionado';
                                        }else{
                                            $estudio = $pregunta->estudio;
                                        }
                                    @endphp

                                    @if ($pregunta->id == 1)

                                        <tr>
                                            <td>{{ ($loop->index)+1 }}</td>
                                            <td>{{ $pregunta->nombre }}</td>
                                            <td>Dato no proporcionado</td>
                                            <td>{{ $pregunta->edad }}</td>
                                            <td>{{ $estudio }}</td>
                                            <td>{{ $pregunta->respuesta_texto }}</td>
                                        </tr>
                                        
                                    @else

                                    <tr>
                                        <td>{{ ($loop->index)+1 }}</td>
                                        <td>Usuario Anónimo</td>
                                        <td>{{ $pregunta->nombre }}</td>
                                        <td>{{ $pregunta->edad }}</td>
                                        <td>{{ $estudio }}</td>
                                        <td>{{ $pregunta->respuesta_texto }}</td>
                                    </tr>
                                        
                                    @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">

                        {{ $pregunta4->links() }}

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
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>Genero</th>
                                    <th>Edad</th>
                                    <th>Estudio</th>
                                    <th>Respuesta Texto</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pregunta5 as $pregunta)

                                    @php
                                        if($pregunta->estudio == '0'){
                                            $estudio = 'Dato no proporcionado';
                                        }else{
                                            $estudio = $pregunta->estudio;
                                        }
                                    @endphp

                                    @if ($pregunta->id == 1)

                                        <tr>
                                            <td>{{ ($loop->index)+1 }}</td>
                                            <td>{{ $pregunta->nombre }}</td>
                                            <td>Dato no proporcionado</td>
                                            <td>{{ $pregunta->edad }}</td>
                                            <td>{{ $estudio }}</td>
                                            <td>{{ $pregunta->respuesta_texto }}</td>
                                        </tr>
                                        
                                    @else

                                    <tr>
                                        <td>{{ ($loop->index)+1 }}</td>
                                        <td>Usuario Anónimo</td>
                                        <td>{{ $pregunta->nombre }}</td>
                                        <td>{{ $pregunta->edad }}</td>
                                        <td>{{ $estudio }}</td>
                                        <td>{{ $pregunta->respuesta_texto }}</td>
                                    </tr>
                                        
                                    @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">

                        {{ $pregunta5->links() }}

                    </div>
                </div>

            </div>



        </div>
    </div>
@stop



@section('js')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [@php 

                    foreach ($pregunta2 as $key => $value) {
                                    echo "'".$value['respuesta_texto']."',";
                                }
                
                
                @endphp],
                datasets: [{
                    label: '# of Votes',
                    data: [@php 

                    foreach ($pregunta2 as $key => $value) {
                                    echo "'".$value['total']."',";
                                }
                    

                    @endphp],
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

        var ctx2 = document.getElementById('motivos').getContext('2d');

        let titulos = ['Tiempo de Respuesta o Resolución demasiado largo', 
                 'Demasiados requisitos', 
                 'Mala atención del Servidor Público', 
                 'Trámite muy complejo, proceso tedioso y largo', 
                 'Solicitud de dadivas para su agilización (Corrupción)', 
                 'No conozco las oficinas para realizarlo', 
                 'Dificultad para localizar las oficinas de atención',];

        var myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: [ @php  foreach ($motivos as $key => $value) {
        echo "'".$value['respuesta_texto']."',";
    } @endphp],
                datasets: [{
                    label: '',
                    data: [@php 
                                foreach ($motivos as $key => $value) {
                                    echo "'".$value['total']."',";
                                }
                    @endphp ],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
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
