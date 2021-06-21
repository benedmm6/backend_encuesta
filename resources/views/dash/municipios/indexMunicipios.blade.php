@extends('adminlte::page')

@section('title', 'Municipios')

@section('content_header')

    <div class="container-fluid">
        
        <div class="row mb-2">
            
            <div class="col-sm-6">
                <h1>Administrador de Municipios</h1>
            </div>
            
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    
                    <li class="breadcrumb-item active">Municipios</li>
            
                </ol>

            </div>
        </div>
    
    </div>

@stop

@section('content')

    {{-- TABLA DEL CONTENIDO PRINCIPAL --}}

    <div class="row">
        
        <div class="col-12">

            <div class="card">
                
                <div class="card-header">
                    
                    <h3 class="card-title">Lista de Municipios</h3>

                    <div class="card-tools">
                        
                        <button class="btn btn-primary" data-toggle="modal" data-target="#agregarMunicipio"><i class="fas fa-fw fa-plus"></i>Agregar municipio</button>
                    
                    </div>
                
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-head-fixed tablaMunicipios" >

                        <thead>
        
                            <tr>
                                <th>#</th>
                                
                                <th>Nombre</th>

                                <th>Icono</th>
                                
                                <th>Acciones</th>
                            
                            </tr>
                
                        </thead>

                        <tbody>

                            {{--    VALIDA QUE LA VARIABLE QUE VIENE DEL CONTROLADOR TENGA INFORMACIÓN
                                    EN CASO DE QUE NO TENGA MOSTRAR EL MENSAJE DE ABAJO                 --}}

                            @if (isset($municipios))

                                @foreach ($municipios as $municipio)

                                    <tr>

                                        <td>{{ ($loop->index)+1 }}</td>
                                        
                                        <td>{{ $municipio->nombre_municipio }}</td>

                                        <td>

                                            @if ($municipio->icono != null || $municipio->icono != '' )

                                                <img src="http://encuestas.test/storage/{{ $municipio->icono }}" class="img-thumbail" width="50px">

                                            @else

                                                <img src="http://encuestas.test/storage/iconos/vacio.png" class="img-thumbail" width="100px">
                                                
                                            @endif
                                            
                                        </td>

                                        <td width='10px'>
                                            
                                            <div class="btn-group">
                                                {{-- <button class="btn btn-primary"><i class="fas fa-eye"></i></button> --}}
                                            
                                                <button idMunicipio="{{ $municipio->id }}" class="btn btn-warning btnEditarMunicipio" data-toggle="modal" data-target="#editarMunicipio"><i class="fas fa-edit"></i></button>
                                            
                                                <button idMunicipio="{{ $municipio->id }}" class="btn btn-danger btnEliminar"><i class="fas fa-trash-alt "></i></button>
                                                
                                            </div>
                                            
                                        </td>
                                    
                                    </tr>
                                    
                                @endforeach

                            @else

                                <tr>

                                    <td>No hay registros de municipios</td>

                                </tr>

                            
                            @endif
                
                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    
    </div>

    {{-- MODAL EDITAR USUARIO --}}

    @include('dash.municipios.editMunicipio')

    {{-- MODAL DE AGREGAR USUARIO --}}

    @include('dash.municipios.createMunicipio')

@stop

@section('plugins.sweetalert2', true)

@section('js')

    <script type="text/javascript">

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if(session('info') == 'ok')
        
             Toast.fire('El municipio se agrego correctamente', '', 'success')

            // Toast.fire({
            //     icon: 'success',
            //     title: 'Signed in successfully'
            // })

        @endif

        @if(session('info') == 'ok_edit')

            Toast.fire('El municipio se actualizo correctamente', '', 'success')
            
        @endif

    </script>

    <script type="text/javascript">

            $(document).ready(function(){


                $(".picture").attr("src", `http://encuestas.test/storage/iconos/vacio.png`);

                $('.file').change(function(){
       
                    var imagen = this.files[0];

                    var datosImagen = new FileReader;

                    datosImagen.readAsDataURL(imagen);

                    $(datosImagen).on('load', function(event){

                        $(".picture").attr("src", event.target.result);

                        console.log(rutaImagen);

                    });

                });


                $('.tablaMunicipios tbody').on('click', '.btnEditarMunicipio', function(){

                    $(".picture").attr("src", `http://encuestas.test/storage/iconos/vacio.png`);

                    $('#editNombre').val('');

                    $('#idMunicipio').val('');

                    var idMunicipio = $(this).attr("idMunicipio");

                    let _url = `http://encuestas.test/municipios/${idMunicipio}`;

                    $.ajax({
                        url: _url,
                        type: "GET",
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function(response){
                            if(response){

                                $('#idMunicipio').val(response.id);

                                $('#editNombre').val(response.nombre_municipio);

                                $('#foto_actual').val(response.icono);

                                if(response.icono != ""){
                                    $(".picture").attr("src", `http://encuestas.test/storage/${response.icono}`);
                                }else{
                                    $(".picture").attr("src", `http://encuestas.test/storage/iconos/vacio.png`);
                                }

                                $("#editar").attr('action', `http://encuestas.test/municipios/${response.id}`)
              
                            }                
                        }
                    });
                });

                $('.tablaMunicipios tbody').on('click', '.btnEliminar', function(){

                    var idMunicipio = $(this).attr("idMunicipio");

                    let _url = `http://encuestas.test/municipios/${idMunicipio}`;

                    let _token   = $('meta[name="csrf-token"]').attr('content');

                    Swal.fire({
                            title: '¿Está seguro de borrar el municipio?',
                            text: '¡Si no lo está puede cancelar la acción!',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Cancelar',
                            confirmButtonText: 'Si, borrar municipio'
                        }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.value) {
                            console.log(idMunicipio);
                            $.ajax({
                                url: _url,
                                type: 'DELETE',
                                data: {
                                _token: _token
                                },
                                success: function(response) {

                                    window.location.href = "{{ route('admin.municipios.index')}}";

                                    Toast.fire('El municipio se elimino correctamente', '', 'success')

                                }
                            });
                        } 
                    })

                });

            });

    </script>
@stop