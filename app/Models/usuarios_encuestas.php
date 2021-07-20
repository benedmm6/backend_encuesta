<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios_encuestas extends Model
{
    use HasFactory;

    protected $fillable = ['id_usuario','id_encuesta','id_municipio'];
    
}
