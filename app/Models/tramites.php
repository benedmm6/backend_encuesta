<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tramites extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_tramite','descripcion_tramite','descripcion_corta','id_categoria','id_municipio'];

    //relacion uno  a mucho

    public function encuestas(){

        return $this->hasMany(encuestas::class);

    }

    public function municipio(){
        return $this->belongsTo('App\Models\municipios','id_municipio','id');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\categorias','id_categoria','id');
    }
}
