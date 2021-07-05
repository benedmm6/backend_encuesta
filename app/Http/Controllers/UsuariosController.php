<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('can:admin.usuarios.index')->only('index');
         $this->middleware('can:admin.usuarios.edit')->only('edit');
         $this->middleware('can:admin.usuarios.create')->only('create');
         $this->middleware('can:admin.usuarios.destroy')->only('destroy');
    }
    public function index()
    {
        $usuarios= User::all();
  
        return view('dash.usuarios.indexUsuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles= Role::all();
        return view('dash.usuarios.createUsuarios',compact('roles'));
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
        $validated = $request->validate([
            'name' => 'required|unique:usuarios'
        ]);        
  
      User::create($request->all());

      
       

        return redirect()->route('admin.usuarios.index')->with('info','El usuario se agrego correctamente');
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
    public function edit(User $usuario)
    {
        //
        $roles= Role::all();
        return view('dash.usuarios.editUsuarios',compact('usuario','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        //
        $usuario->roles()->sync($request->roles);
        return redirect()->route('admin.usuarios.edit',$usuario)->with('info','Se asigno un rol correctamente');
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
