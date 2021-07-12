<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\categorias;

use App\Models\municipios;

use App\Models\encuestas;

use Illuminate\Support\Facades\DB;

class HomeCategoriasController extends Controller
{
    public function index(){


            $categorias = categorias::all();

            $hoy = date("Y-m-d");

            $encuestas = encuestas::where('estado', '=', '1' )
                                ->whereRaw('CURDATE() BETWEEN date(created_at) AND date(fecha_vencimiento)')->get();

            $totalCategoria = encuestas::select(DB::raw('id_categoria, count(*) as total'))
                                    ->where('estado', '=', '1' )
                                    ->whereRaw('CURDATE() BETWEEN date(created_at) AND date(fecha_vencimiento)')
                                    ->groupBy('id_categoria')->get();

        return view('frontend.categorias', compact('categorias','encuestas', 'totalCategoria'));

        return redirect()->route('home.usuarios.index');

    }

    public function showCategoria($id){

        $categoria = categorias::find($id);

        $municipios = municipios::all();

        $hoy = date("Y-m-d");

        $encuestas = encuestas::where('estado', '=', '1' )
                                ->where('id_categoria', '=', $id)
                                ->whereRaw('CURDATE() BETWEEN date(created_at) AND date(fecha_vencimiento)')->get();

        return view('frontend.showCategoria', compact('categoria','municipios','encuestas'));

    }
}
