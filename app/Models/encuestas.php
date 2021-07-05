<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class encuestas extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_encuesta','estado', 'fecha_vencimiento', 'descripcion_encuesta','instrucciones_encuesta','agradecimiento_encuesta','id_categoria'];

    // QUERY SCOPE 

    public function nombreEncuesta($query, $nombre){
        
        if($nombre){
         
            return $query->where('nombre_encuesta', 'LIKE', ''%$nombre%'');
        
        }
    }

    public function categoriaEncuesta($query, $categoria){
        
        if($categoria){
         
            return $query->where('id_categoria', '=', "$categoria");
        
        }
    }

    public function estadoEncuesta($query, $estado){
        
        if($estado){
         
            return $query->where('estado', '=' , "$estado");
        
        }
    }
}
