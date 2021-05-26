<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcionesRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opciones_respuestas', function (Blueprint $table) {
            
            $table->id();
            
            $table->text('opcion_respuesta');
            
            $table->integer('orden_opcion');
            
            $table->unsignedBigInteger('id_pregunta');
            
            $table->foreign('id_pregunta')->references('id')->on('preguntas')->onDelete('cascade');
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opciones_respuestas');
    }
}
