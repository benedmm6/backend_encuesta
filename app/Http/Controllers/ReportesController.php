<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\usuarios_respuestas;

use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.reportes.indexReportes');
    }

    public function indexEstatal()
    {

        $participaciones = usuarios_respuestas::select(DB::raw('COUNT(id_participante) AS participantes'))
                                                ->where('id_categoria','=','1')
                                                ->groupBy('id_participante')->get();

        $pregunta1A= usuarios_respuestas::select('nombre','email','respuesta_texto',DB::raw('(SELECT respuesta_texto FROM usuarios_respuestas  WHERE pregunta = "5" AND id_participante = participantes.id) AS opcional') )
        ->join('participantes','usuarios_respuestas.id_participante', '=', 'participantes.id')
        ->where('pregunta','=','2')
        ->where('id_categoria','=','1');

        $pregunta1B=usuarios_respuestas::select('nombre','email','respuesta_texto',DB::raw('(SELECT respuesta_texto FROM usuarios_respuestas  WHERE pregunta = "6" AND id_participante = participantes.id) AS opcional') )
                                        ->join('participantes','usuarios_respuestas.id_participante', '=', 'participantes.id')
                                        ->where('pregunta','=','3')
                                        ->where('id_categoria','=','1');

        $pregunta1 = usuarios_respuestas::select('nombre','email','respuesta_texto',DB::raw('(SELECT respuesta_texto FROM usuarios_respuestas  WHERE pregunta = "4" AND id_participante = participantes.id) AS opcional') )
                                        ->join('participantes','usuarios_respuestas.id_participante', '=', 'participantes.id')
                                        ->where('pregunta','=','1')
                                        ->where('id_categoria','=','1')
                                        ->union($pregunta1A)
                                        ->union($pregunta1B)
                                        ->get();

        $pregunta3 = usuarios_respuestas::select('nombre','email','id_participante')
                                        ->join('participantes','participantes.id', '=', 'usuarios_respuestas.id_participante')
                                        ->where('id_categoria','=','1')
                                        ->whereIn('pregunta', [8,9,10,11,12])->get()
                                        ->groupBy('id_participante');

        $tramites = usuarios_respuestas::select('respuesta_texto','id_participante')
                                        ->where('id_categoria','=','1')
                                        ->whereIn('pregunta', [8,9,10,11,12])->get();

        $pregunta4 = usuarios_respuestas::select('nombre','email','respuesta_texto')
                        ->join('participantes','usuarios_respuestas.id_participante', '=', 'participantes.id')
                        ->where('pregunta','=','13')
                        ->where('id_categoria','=','1')->get();

        $pregunta5 = usuarios_respuestas::select('nombre','email','respuesta_texto')
                        ->join('participantes','usuarios_respuestas.id_participante', '=', 'participantes.id')
                        ->where('pregunta','=','14')
                        ->where('id_categoria','=','1')->get();

        $pregunta2 = usuarios_respuestas::select('respuesta_texto',DB::raw('count(*) as total'))
                                                ->where('pregunta','=','7')
                                                ->where('id_categoria','=','1')
                                                ->groupBy('respuesta_texto')->get();
                                                


        return view('dash.reportes.indexEstatal', compact('participaciones','pregunta1','pregunta2','pregunta3','tramites','pregunta4','pregunta5'));

    }

    public function indexMunicipal(){

        // TOTAL DE PARCITIPACIONES

        $participaciones = usuarios_respuestas::select(DB::raw('COUNT(id_participante) AS participantes'))
                                                ->where('id_categoria','=','2')
                                                ->groupBy('id_participante')->get();

          $pregunta1A= usuarios_respuestas::select('nombre','email','respuesta_texto',DB::raw('(SELECT respuesta_texto FROM usuarios_respuestas  WHERE pregunta = "5" AND id_participante = participantes.id) AS opcional') )
                                            ->join('participantes','usuarios_respuestas.id_participante', '=', 'participantes.id')
                                            ->where('pregunta','=','2')
                                            ->where('id_categoria','=','2');

        $pregunta1B=usuarios_respuestas::select('nombre','email','respuesta_texto',DB::raw('(SELECT respuesta_texto FROM usuarios_respuestas  WHERE pregunta = "6" AND id_participante = participantes.id) AS opcional') )
                                        ->join('participantes','usuarios_respuestas.id_participante', '=', 'participantes.id')
                                        ->where('pregunta','=','3')
                                        ->where('id_categoria','=','2');

        $pregunta1 = usuarios_respuestas::select('nombre','email','respuesta_texto',DB::raw('(SELECT respuesta_texto FROM usuarios_respuestas  WHERE pregunta = "4" AND id_participante = participantes.id) AS opcional') )
                                        ->join('participantes','usuarios_respuestas.id_participante', '=', 'participantes.id')
                                        ->where('pregunta','=','1')
                                        ->where('id_categoria','=','2')
                                        ->union($pregunta1A)
                                        ->union($pregunta1B)
                                        ->get();

                                        $pregunta3 = usuarios_respuestas::select('nombre','email','id_participante')
                                        ->join('participantes','participantes.id', '=', 'usuarios_respuestas.id_participante')
                                        ->where('id_categoria','=','2')
                                        ->whereIn('pregunta', [8,9,10,11,12])->get()
                                        ->groupBy('id_participante');

        $tramites = usuarios_respuestas::select('respuesta_texto','id_participante')
                                        ->where('id_categoria','=','2')
                                        ->whereIn('pregunta', [8,9,10,11,12])->get();

        $pregunta4 = usuarios_respuestas::select('nombre','email','respuesta_texto')
                        ->join('participantes','usuarios_respuestas.id_participante', '=', 'participantes.id')
                        ->where('pregunta','=','13')
                        ->where('id_categoria','=','2')->get();

        $pregunta5 = usuarios_respuestas::select('nombre','email','respuesta_texto')
                        ->join('participantes','usuarios_respuestas.id_participante', '=', 'participantes.id')
                        ->where('pregunta','=','14')
                        ->where('id_categoria','=','2')->get();

        $pregunta2 = usuarios_respuestas::select('respuesta_texto',DB::raw('count(*) as total'))
                                                ->where('pregunta','=','7')
                                                ->where('id_categoria','=','2')
                                                ->groupBy('respuesta_texto')->get();

        return view('dash.reportes.indexMunicipal', compact('participaciones','pregunta1','pregunta2','pregunta3','tramites','pregunta4','pregunta5'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
