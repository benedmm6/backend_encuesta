<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_respuestas', function (Blueprint $table) {

            $table->id();
            
            $table->text('respuesta_texto')->nullable();
            
            $table->unsignedBigInteger('id_usuario');
            
            $table->unsignedBigInteger('id_pregunta');
            
            $table->unsignedBigInteger('id_opcion');
            
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            
            $table->foreign('id_pregunta')->references('id')->on('preguntas')->onDelete('cascade');
            
            $table->foreign('id_opcion')->references('id')->on('opciones_respuestas')->onDelete('cascade');
            
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
        Schema::dropIfExists('usuarios_respuestas');
    }
}
