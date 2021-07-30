<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios_respuestas extends Model
{
    use HasFactory;

    protected $fillable = ['pregunta','id_participante','respuesta_texto'];

}
