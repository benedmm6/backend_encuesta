<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            
            $table->id();
            
            $table->string('nombre_pregunta');
            
            $table->enum('obligatoria', [0,1])->default(0);
            
            $table->string('tipo_pregunta');
            
            $table->integer('orden_pregunta');
            
            $table->enum('busqueda', [0,1])->default(0);
            
            $table->integer('tipo_busqueda');

            $table->unsignedBigInteger('id_encuesta');

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
        Schema::dropIfExists('preguntas');
    }
}
