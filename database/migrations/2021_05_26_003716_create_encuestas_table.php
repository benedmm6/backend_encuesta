<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            
            $table->id();
            
            $table->text('nombre_encuesta');
            
            $table->enum('estado',[0,1])->default(1);

            $table->dateTime('fecha_vencimiento', $precision = 0);

            $table->text('descripcion_encuesta')->nullable();

            $table->text('instrucciones_encuesta')->nullable();

            $table->text('agradecimiento_encuesta')->nullable();

            $table->unsignedBigInteger('id_categoria');

            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');

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
        Schema::dropIfExists('encuestas');
    }
}
