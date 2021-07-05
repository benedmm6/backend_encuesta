<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\EncuestasController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\TramitesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/registro', function () {
    return view('auth.register');
})->name('registro');

Route::middleware(['auth:sanctum', 'verified'])->get('dash', function () {

    return view('dash.index');
})->name('dash');

// RUTA CRUD PARA LOS USUARIOS
Route::resource('usuarios', UsuariosController::class)->names('admin.usuarios');

// RUTA CRUD PARA LAS ENCUESTAS


Route::delete('encuestas/{id}/preguntas/delete', [EncuestasController::class, 'destroyPregunta'])->name('admin.encuestas.deletePreguntas');

Route::post('encuestas/{id}/preguntas/create', [EncuestasController::class, 'storePreguntas'])->name('admin.encuestas.storePreguntas');

Route::get('encuestas/{id}/preguntas', [EncuestasController::class, 'indexPreguntas'])->name('admin.encuestas.indexPreguntas');

Route::post('encuestas/{id}/estado', [EncuestasController::class, 'updateEstado'])->name('admin.encuestas.updateEstado');

Route::middleware(['auth:sanctum', 'verified'])->resource('encuestas', EncuestasController::class)->names('admin.encuestas');


// RUTA CRUD PARA LAS CATEGORIAS
Route::resource('categorias', CategoriasController::class)->names('admin.categorias');

// RUTA CRUD PARA LOS MUNICIPIOS
Route::resource('municipios', MunicipiosController::class)->names('admin.municipios');

// RUTA CRUD PARA LOS TRAMITES
Route::resource('tramites', TramitesController::class)->names('admin.tramites');

// RUTA CRUD PARA LOS ROLES
Route::resource('roles', RolesController::class)->names('admin.roles');

// RUTA CRUD PARA LOS PERMISOS
Route::resource('permisos', PermisosController::class)->names('admin.permisos');

