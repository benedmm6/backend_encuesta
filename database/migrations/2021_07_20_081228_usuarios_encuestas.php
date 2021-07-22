<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuariosEncuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_encuestas', function (Blueprint $table) {

            $table->unsignedBigInteger('id_usuario');

            $table->unsignedBigInteger('id_municipio')->nullable();

            $table->unsignedBigInteger('id_encuesta');

            $table->foreign('id_municipio')->references('id')->on('municipios')->onDelete('cascade');

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('id_encuesta')->references('id')->on('encuestas')->onDelete('cascade');
            
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
        Schema::dropIfExists('usuarios_encuestas');
    }
}
