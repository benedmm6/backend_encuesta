<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\categorias;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('can:admin.categorias.index')->only('index');
         $this->middleware('can:admin.categorias.edit')->only('edit');
         $this->middleware('can:admin.categorias.create')->only('create');
         $this->middleware('can:admin.categorias.destroy')->only('destroy');
    }
    public function index()
    {
        $categorias = categorias::all();

        return view('dash.categorias.indexCategorias', compact('categorias') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.categorias.createCategorias');
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
            'nombre_categoria' => 'required|unique:categorias'
        ]);

        categorias::create($request->all());

        return redirect()->route('admin.categorias.index')->with('info','La categoria se agrego correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(categorias $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(categorias $categoria)
    {
        return view('dash.categorias.editCategorias', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categorias $categoria)
    {
        $validated = $request->validate([
            'nombre_categoria' => 'required|unique:categorias'
        ]);

        $categoria->update($request->all());

        return redirect()->route('admin.categorias.edit',$categoria)->with('info','La categoria se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorias $categoria)
    {
        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('info','La categoria eliminada correctamente');
    }
}
