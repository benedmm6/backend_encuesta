<?php

namespace App\Http\Controllers;

use App\Models\tramites;
use App\Models\categorias;
use App\Models\municipios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TramitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto= $request->get('busqueda');
        $tramites = DB::table('tramites')
        ->select('id','nombre_tramite','descripcion_tramite','descripcion_corta','id_categoria','id_municipio')
        ->where('nombre_tramite','LIKE','%'.$texto.'%')
        ->orWhere('id_municipio','LIKE','%'.$texto.'%')
        ->orderBy('nombre_tramite','asc')
        ->paginate(10);
        $municipios = municipios::all();
        $categorias = categorias::all(); 

        return view('dash.tramites.indexTramites', compact('tramites','municipios','categorias','texto') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias= categorias::pluck('nombre_categoria','id')->toArray();
        $municipios= municipios::pluck('nombre_municipio','id')->toArray();
           

        return view('dash.tramites.createTramites', compact('municipios','categorias'));
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
            'nombre_tramite' => 'required|unique:tramites'
        ]);        
  
        tramites::create($request->all());
       

        return redirect()->route('admin.tramites.index')->with('info','El tramite se agrego correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(tramites $tramite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(tramites $tramite,)
    {
        $municipios= municipios::pluck('nombre_municipio','id');
        $categorias= categorias::pluck('nombre_categoria','id');
        return view('dash.tramites.editTramites', compact('tramite','municipios','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tramites $tramite)
    {
        $validated = $request->validate([
            'nombre_tramite' => 'required|unique:tramites'
        ]);

        $tramite->update($request->all());

        return redirect()->route('admin.tramites.edit',$tramite)->with('info','El tramite se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(tramites $tramite)
    {
        $tramite->delete();

        return redirect()->route('admin.tramites.index')->with('info','El tramite eliminada correctamente');
    }
}
