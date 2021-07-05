<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opciones_respuestas extends Model
{
    use HasFactory;

    protected $fillable = ['opcion_respuesta', 'id_pregunta', 'orden_opcion'];
}