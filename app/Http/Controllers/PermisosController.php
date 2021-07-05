<?php

namespace App\Http\Controllers;

use App\Models\permisos;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('can:admin.permisos.index')->only('index');
         $this->middleware('can:admin.permisos.edit')->only('edit');
         $this->middleware('can:admin.permisos.create')->only('create');
         $this->middleware('can:admin.permisos.destroy')->only('destroy');
    }
    public function index()
    {
        //
        $permission= Permission::all();
        return view('dash.permisos.index', compact('permission'));
  
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
        return view('dash.permisos.create', compact('roles'));
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
        $request->validate([
            'name'=>'required'
        ]);
        $permission = Permission::create($request->all());

        $permission->roles()->sync($request->roles);

        return redirect()->route('admin.permisos.index',$permission)->with('info','El permiso se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
        return view('dash.permisos.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
        $roles= Role::all();
        return view('dash.permisos.edit', compact('roles','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
        $request->validate([
            'name'=>'required'
        ]);
        $permission -> update($request->all());

        $permission->roles()->sync($request->roles);

        return redirect()->route('admin.permisos.edit',$permission)->with('info','El permiso se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
        $permission->delete();
        return redirect()->route('admin.permisos.index')->with('info','El permiso se elimino con exito');
    }
}
