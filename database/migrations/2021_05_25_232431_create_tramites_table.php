<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            
            $table->text('nombre_tramite');
            
            $table->text('descripcion_tramite')->nullable();
            
            $table->text('descripcion_corta')->nullable();

            $table->unsignedBigInteger('id_categoria');

            $table->unsignedBigInteger('id_municipio');

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
        Schema::dropIfExists('tramites');
    }
}
