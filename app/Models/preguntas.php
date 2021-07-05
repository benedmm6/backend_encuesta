<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preguntas extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_pregunta','obligatoria','tipo_pregunta','orden_pregunta','busqueda','tipo_busqueda', 'id_encuesta'];
}
