<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\municipios;

use Illuminate\Support\Facades\Storage;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('can:admin.municipios.index')->only('index');
         $this->middleware('can:admin.municipios.edit')->only('edit');
         $this->middleware('can:admin.municipios.create')->only('create');
         $this->middleware('can:admin.municipios.destroy')->only('destroy');
    }
    public function index()
    {

        $municipios = municipios::all();

        return view('dash.municipios.indexMunicipios', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.municipios.createMunicipio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('file');

        // return Storage::put('iconos', $request->file('file'));

        $validated = $request->validate([
            'nombre_municipio' => 'required|unique:municipios'
        ]);

         $nombre =  $request->input('nombre_municipio');

         if($request->file('file')){
             
            // $url = Storage::put('iconos', $request->file('file'),'public');

            $name = $request->file('file')->getClientOriginalName();

            $url = Storage::putFileAs(
                'iconos', $request->file('file'), $name,'public'
            );
         
        }else{
        
            $url = 'iconos/vacio.png';
        
        }

         municipios::create([
             'nombre_municipio' => $nombre,
             'icono' => $url
         ]);

        return redirect()->route('admin.municipios.index')->with('info','ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipio = municipios::find($id);

        $idMunicipio = $id;

        return response()->json($municipio);

        redirect()->route('admin.municipios.index', compact('idMunicipio'));

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
        // $validated = $request->validate([
        //     'nombre_municipio' => 'required|unique:municipios'
        // ]);

        $municipio = municipios::find($id);

        if($request->file('file2')){

            Storage::delete($request->input('foto_actual'));

            $name = $request->file('file2')->getClientOriginalName();

            $url = Storage::putFileAs(
                'iconos', $request->file('file2'), $name,'public'
            );

        }else{

            $url = $request->input('foto_actual');
        
        }

        $update = [
            "nombre_municipio" => $request->input('nombre_municipio'),
            "icono" => $url,
        ];

        $municipio->update($update);

        return redirect()->route('admin.municipios.index')->with('info','ok_edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $municipio = municipios::find($id);

        Storage::delete($municipio->icono);

        $municipio->delete();

        return response()->json(['success'=>'ELIMINADO']);

    }
}
