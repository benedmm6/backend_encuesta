<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\categorias;

use App\Models\municipios;

class HomeCategoriasController extends Controller
{
    public function index(){

        $categorias = categorias::all();

        return view('frontend.categorias', compact('categorias'));

    }

    public function showCategoria($id){

        $categoria = categorias::find($id);

        $municipios = municipios::all();

        return view('frontend.showCategoria', compact('categoria','municipios'));

    }
}
