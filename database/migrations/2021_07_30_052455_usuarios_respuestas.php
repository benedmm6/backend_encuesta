<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuariosRespuestas extends Migration
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

            $table->integer('pregunta');
            
            $table->text('respuesta_texto')->nullable();
            
            $table->unsignedBigInteger('id_participante')->nullable();
            
            $table->unsignedBigInteger('id_categoria');
            
            $table->unsignedBigInteger('id_municipio')->nullable();
            
            $table->foreign('id_participante')->references('id')->on('participantes')->onDelete('cascade');
            
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
            
            $table->foreign('id_municipio')->references('id')->on('municipios')->onDelete('cascade');
            
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
