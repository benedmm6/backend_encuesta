<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipios extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_municipio', 'icono'];

    //relacion uno  a mucho
    
    public function encuestas(){

        return $this->hasMany(encuestas::class);

    }
}
