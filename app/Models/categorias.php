<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_categoria'];

    //relacion uno  a mucho

    public function encuestas(){

        return $this->hasMany(encuestas::class);

    }

}
