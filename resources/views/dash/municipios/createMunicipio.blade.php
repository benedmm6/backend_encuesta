
<div class="modal fade" id="agregarMunicipio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
    <div class="modal-dialog" role="document">
    
        <div class="modal-content">
    
            <div class="modal-header">
    
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo municipio</h5>
    
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
                    <span aria-hidden="true">&times;</span>
    
                </button>
    
            </div> 

            <div class="modal-body">

                {!! Form::open(['route' => 'admin.municipios.store', 'files' => true]) !!}

                <div class="form-group">

                    {!! Form::label('nombre_municipio', 'Nombre del municipio') !!}

                    {!! Form::text('nombre_municipio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del municipio']) !!}

                </div>

                <div class="form-group">

                    {!! Form::label('icono', 'Icono del municipio') !!}

                    {!! Form::file('file',['class' => 'form-control-file file','accept' => 'image/*']) !!}

                </div>
    
                <p>Indicaciones de imagenes</p>

                <div class="row mb-3">

                    <div class="col">
                        
                        <div class="form-group">

                            {!! Form::label('vista_previa', 'Vista previa') !!}

                            <br>
                        
                            <img class="picture" src="http://encuestas.test/storage/iconos/vacio.png" alt="Vista previa del Icono">
                        
                        </div>
                    
                    </div>

                </div>

            </div>
    
            <div class="modal-footer">
    
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    
                {!! Form::submit('Agregar Municipio', ['class' => 'btn btn-primary']) !!}
    
            </div>

            {!! Form::close() !!}
    
        </div>
    
    </div>

</div>
