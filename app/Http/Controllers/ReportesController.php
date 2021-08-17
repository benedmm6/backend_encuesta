<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\usuarios_respuestas;

use App\Models\municipios;

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
       
    }

    public function indexEstatal()
    {

        $participaciones = usuarios_respuestas::select(DB::raw('COUNT(id_participante) AS participantes'))
                                                ->where('id_categoria','=','1')
                                                ->groupBy('id_participante')->get();

        $pregunta1 = usuarios_respuestas::select('participantes.email', 'participantes.nombre', 'participantes.edad', 'participantes.estudio','usuarios_respuestas.respuesta_texto')
                                        ->join('participantes', 'participantes.id','=','usuarios_respuestas.id_participante')
                                        ->where('usuarios_respuestas.id_categoria', '=', '1')
                                        ->whereIn('usuarios_respuestas.pregunta', [1,2,3])
                                        ->orderBy('usuarios_respuestas.created_at', 'desc')
                                        ->paginate(10);

        $motivos = usuarios_respuestas::select('respuesta_texto', DB::raw('COUNT(*) AS total') )
                                        ->where('id_categoria', '=', '1')
                                        ->whereIn('pregunta',[4,5,6])
                                        ->groupBy('respuesta_texto')
                                        ->orderBy(DB::raw('COUNT(*)'), 'desc')->get();

        $pregunta2 = usuarios_respuestas::select('respuesta_texto',DB::raw('count(*) as total'))
                                                ->where('pregunta','=','7')
                                                ->where('id_categoria','=','1')
                                                ->groupBy('respuesta_texto')
                                                ->orderBy('respuesta_texto', 'desc')
                                                ->get();

        $pregunta3 = usuarios_respuestas::select(DB::raw("participantes.id,participantes.nombre, 
                                                        IFNULL(participantes.email,'Dato no proporcionado') AS ocupacion,
                                                        IFNULL(participantes.edad,'Dato no proporcionado') AS edad, 
                                                        IFNULL(participantes.estudio, 'Dato no proporcionado') AS estudio"), 'respuesta_texto')
                                        ->join('participantes','participantes.id', '=', 'usuarios_respuestas.id_participante')
                                        ->where('id_categoria','=','1')
                                        ->whereIn('pregunta', [8,9,10,11,12])
                                        ->whereNotNull('respuesta_texto')
                                        ->paginate(10);

        $pregunta4 = usuarios_respuestas::select(DB::raw("participantes.id,participantes.nombre, 
                                                        IFNULL(participantes.email,'Dato no proporcionado') AS ocupacion,
                                                        IFNULL(participantes.edad,'Dato no proporcionado') AS edad, 
                                                        IFNULL(participantes.estudio, 'Dato no proporcionado') AS estudio"), 'respuesta_texto')
                                        ->join('participantes','participantes.id', '=', 'usuarios_respuestas.id_participante')
                                        ->where('id_categoria','=','1')
                                        ->where('pregunta', '=', '13')
                                        ->whereNotNull('respuesta_texto')
                                        ->paginate(10);

        $pregunta5 = usuarios_respuestas::select(DB::raw("participantes.id,participantes.nombre, 
                                                        IFNULL(participantes.email,'Dato no proporcionado') AS ocupacion,
                                                        IFNULL(participantes.edad,'Dato no proporcionado') AS edad, 
                                                        IFNULL(participantes.estudio, 'Dato no proporcionado') AS estudio"), 'respuesta_texto')
                                        ->join('participantes','participantes.id', '=', 'usuarios_respuestas.id_participante')
                                        ->where('id_categoria','=','1')
                                        ->where('pregunta', '=', '14')
                                        ->whereNotNull('respuesta_texto')
                                        ->paginate(10);

        return view('dash.reportes.indexEstatal', compact('participaciones','motivos','pregunta1','pregunta2','pregunta3','pregunta4','pregunta5'));

    }

    public function indexMunicipal(Request $request){

        $busqueda= $request->get('municipio');

        $municipios = municipios::select('nombre_municipio','id')->get();

            $pregunta1 = usuarios_respuestas::select(DB::raw("IFNULL(participantes.email, 'Datos no proporcionados') AS email, 
                                                            IFNULL(participantes.nombre, 'Datos no proporcionados') AS nombre,
                                                            IFNULL(participantes.edad, 'Datos no proporcionados') AS edad, 
                                                            IFNULL(participantes.estudio, 'Datos no proporcionados')AS estudio, 
                                                            usuarios_respuestas.respuesta_texto"))
                                        ->join('participantes', 'participantes.id','=','usuarios_respuestas.id_participante')
                                        ->where('usuarios_respuestas.id_categoria', '=', '2')
                                        ->where('usuarios_respuestas.id_municipio', '=', $busqueda)
                                        ->whereIn('usuarios_respuestas.pregunta', [1,2,3])
                                        ->orderBy('usuarios_respuestas.created_at', 'desc')
                                        ->paginate(10);

            $motivos = usuarios_respuestas::select('respuesta_texto', DB::raw('COUNT(*) AS total') )
                                        ->where('id_categoria', '=', '2')
                                        ->where('id_municipio', '=', $busqueda)
                                        ->whereIn('pregunta',[4,5,6])
                                        ->groupBy('respuesta_texto')
                                        ->orderBy(DB::raw('COUNT(*)'), 'desc')->get();

            $pregunta2 = usuarios_respuestas::select('respuesta_texto',DB::raw('count(*) as total'))
                                                ->where('pregunta','=','7')
                                                ->where('id_categoria','=','2')
                                                ->where('id_municipio', '=', $busqueda)
                                                ->groupBy('respuesta_texto')
                                                ->orderBy('respuesta_texto', 'desc')
                                                ->get();
            
            $pregunta3 = usuarios_respuestas::select(DB::raw("participantes.id,participantes.nombre, 
                                                        IFNULL(participantes.email,'Dato no proporcionado') AS ocupacion,
                                                        IFNULL(participantes.edad,'Dato no proporcionado') AS edad, 
                                                        IFNULL(participantes.estudio, 'Dato no proporcionado') AS estudio"), 'respuesta_texto')
                                        ->join('participantes','participantes.id', '=', 'usuarios_respuestas.id_participante')
                                        ->where('id_categoria','=','2')
                                        ->where('id_municipio', '=', $busqueda)
                                        ->whereIn('pregunta', [8,9,10,11,12])
                                        ->whereNotNull('respuesta_texto')
                                        ->paginate(10);

            $pregunta4 = usuarios_respuestas::select(DB::raw("participantes.id,participantes.nombre, 
                                                        IFNULL(participantes.email,'Dato no proporcionado') AS ocupacion,
                                                        IFNULL(participantes.edad,'Dato no proporcionado') AS edad, 
                                                        IFNULL(participantes.estudio, 'Dato no proporcionado') AS estudio"), 'respuesta_texto')
                                        ->join('participantes','participantes.id', '=', 'usuarios_respuestas.id_participante')
                                        ->where('id_categoria','=','2')
                                        ->where('id_municipio', '=', $busqueda)
                                        ->where('pregunta', '=', '13')
                                        ->whereNotNull('respuesta_texto')
                                        ->paginate(10);

            $pregunta5 = usuarios_respuestas::select(DB::raw("participantes.id,participantes.nombre, 
                                                        IFNULL(participantes.email,'Dato no proporcionado') AS ocupacion,
                                                        IFNULL(participantes.edad,'Dato no proporcionado') AS edad, 
                                                        IFNULL(participantes.estudio, 'Dato no proporcionado') AS estudio"), 'respuesta_texto')
                                        ->join('participantes','participantes.id', '=', 'usuarios_respuestas.id_participante')
                                        ->where('id_categoria','=','2')
                                        ->where('pregunta', '=', '14')
                                        ->where('id_municipio', '=', $busqueda)
                                        ->whereNotNull('respuesta_texto')
                                        ->paginate(10);

            return view('dash.reportem.municipal', compact('municipios','motivos','pregunta1','pregunta2','pregunta3','pregunta4','pregunta5','busqueda'));
      
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
