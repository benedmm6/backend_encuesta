<div class="modal fade" id="editarMunicipio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        
        <div class="modal-content">
        
            <div class="modal-header">
        
                <h5 class="modal-title" id="exampleModalLabel">Editar municipio</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
                    <span aria-hidden="true">&times;</span>
    
                </button>
        
            </div>

            <div class="modal-body">

                {!! Form::model(null, [null, 'method' => 'put', 'id' => 'editar','files' => true]) !!}

                {!! Form::hidden('id_municipio', null,['id'=>'idMunicipio','value'=> '']) !!}

                {!! Form::hidden('foto_actual', null,['id'=>'foto_actual','value'=> '']) !!}

                    <div class="form-group">

                        {!! Form::label('nombre_municipio', 'Nombre del municipio') !!}

                        {!! Form::text('nombre_municipio', null, ['id'=> 'editNombre', 'class' => 'form-control', 'value' => '']) !!}
                    
                    </div>

                    <div class="form-group">

                        {!! Form::label('icono', 'Icono del municipio') !!}

                        {!! Form::file('file2',['class' => 'form-control-file file','accept' => 'image/*']) !!}

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
    
                {!! Form::submit('Actualizar Municipio', ['class' => 'btn btn-primary']) !!}
    
            </div>

            {!! Form::close() !!}
        
        </div>
    
    </div>

</div>