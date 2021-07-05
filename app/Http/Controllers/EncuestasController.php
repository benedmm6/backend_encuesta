<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\categorias;

use App\Models\encuestas;

use App\Models\preguntas;

use App\Models\opciones_respuestas;

class EncuestasController extends Controller
{

    public function indexPreguntas($id){

        $idEncuesta = $id;

        $encuesta = encuestas::find($id);

        $categorias= categorias::pluck('nombre_categoria','id')->toArray();

        $preguntas = preguntas::select('preguntas.*')
                    ->join('encuestas', 'preguntas.id_encuesta', '=', 'encuestas.id')
                    ->where('preguntas.id_encuesta', '=', $idEncuesta)->get();

        $opciones = opciones_respuestas::select('opciones_respuestas.*')
                    ->join('preguntas', 'opciones_respuestas.id_pregunta', '=', 'preguntas.id')
                    ->join('encuestas', 'preguntas.id_encuesta', '=', 'encuestas.id')
                    ->where('encuestas.id', '=', $idEncuesta)
                    ->orderBy('opciones_respuestas.orden_opcion')->get();

        return view('dash.encuestas.indexPreguntas',compact('idEncuesta', 'encuesta','categorias','preguntas', 'opciones'));
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $encuestas = encuestas::select('encuestas.*', 'categorias.nombre_categoria')
                ->join('categorias', 'encuestas.id_categoria', '=', 'categorias.id')
                ->paginate(10);

        // $encuestas = encuestas::all();

            $categorias= categorias::pluck('nombre_categoria','id')->toArray();

         return view('dash.encuestas.indexEncuestas',compact('encuestas','categorias'));

        //  return $encuestas;
    }

    // public function fetchEncuestas()
    // {
    //     $encuestas = DB::table('encuestas')
    //         ->join('categorias', 'encuestas.id_categoria', '=', 'categorias.id')
    //         ->select('encuestas.*', 'categorias.nombre_categoria')
    //         ->get();
    //     // $encuestas = encuestas::all();
    //     return response()->json([
    //         'encuestas'=>$encuestas,
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias= categorias::pluck('nombre_categoria','id')->toArray();

        return view('dash.encuestas.createEncuestas', compact('categorias'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_encuesta' => 'required|unique:encuestas'
        ]);

        encuestas::create($request->all());

        return redirect()->route('admin.encuestas.index')->with('info','create');
    }

    public function storePreguntas(Request $request, $id){

        if($request->get('tipo_pregunta') == 'respuestaCorta' || $request->get('tipo_pregunta') == 'respuestaLarga'){
            
            preguntas::create($request->all());
            
            return response()->json('ok');
  
        }
        if($request->get('tipo_pregunta') == 'buscador'){

            preguntas::create($request->all());

            return response()->json('ok');

        }

        if($request->get('tipo_pregunta') == 'variasOpciones'){

            preguntas::create([
                "nombre_pregunta" => $request->get("nombre_pregunta"),
                "obligatoria" => $request->get("obligatoria"),
                "tipo_pregunta" => $request->get("tipo_pregunta"),
                "id_encuesta" => $request->get("id_encuesta")
            ]);

            $lastId = preguntas::latest('id')->first();

            $opciones = $request->get('opciones');

            foreach ($opciones as $key => $opcion) {
                opciones_respuestas::create([
                    "opcion_respuesta" => $opcion,
                    "id_pregunta" => $lastId->id,
                    "orden_opcion" => ($key+1)
                ]);
            }

            return response()->json('ok');

        }

        if($request->get('tipo_pregunta') == 'casillas'){
            
            preguntas::create([
                "nombre_pregunta" => $request->get("nombre_pregunta"),
                "obligatoria" => $request->get("obligatoria"),
                "tipo_pregunta" => $request->get("tipo_pregunta"),
                "id_encuesta" => $request->get("id_encuesta")
            ]);

            $lastId = preguntas::latest('id')->first();

            $opciones = $request->get('opciones');

            foreach ($opciones as $key => $opcion) {
                opciones_respuestas::create([
                    "opcion_respuesta" => $opcion,
                    "id_pregunta" => $lastId->id,
                    "orden_opcion" => ($key+1)
                ]);
            }

            return response()->json('ok');
        }

        redirect()->route('admin.encuestas.indexPreguntas',[$id]);
        
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
    public function edit(encuestas $encuesta)
    {
        $categorias= categorias::pluck('nombre_categoria','id')->toArray();

        return view('dash.encuestas.editEncuestas', compact('categorias', 'encuesta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, encuestas $encuesta)
    {
        $validated = $request->validate([
            'nombre_encuesta' => 'required|unique:encuestas',
            'id_categoria' => 'required'
        ]);

        $encuesta->update($request->all());

        return redirect()->route('admin.encuestas.edit',$encuesta)->with('info','editado');

    }

    public function updateEstado(Request $request, $id)
    {
        // $affected = DB::update(
        //     'update users set votes = 100 where name = ?',
        //     ['Anita']
        // );

        $encuesta = DB::update('update encuestas set estado = ? where id = ?', [$request->estado, $id]);

        return response()->json('ok');

        redirect()->route('admin.encuestas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encuesta = encuestas::find($id);

        $encuesta->delete();

        return response()->json(['success'=>'ELIMINADO']);

    }

    public function destroyPregunta($id){

        $preguntas = preguntas::find($id);

        $preguntas->delete();

        return response()->json(['success'=>'ELIMINADO']);

    }
}
