<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\EncuestasController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\TramitesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ReportesController;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParticipantesController;
use App\Http\Controllers\HomeCategoriasController;
use App\Http\Controllers\HomeEncuestaController;

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

Route::resource('/registro', ParticipantesController::class)->names('home.usuarios');

Route::resource('/inicio-sesion', LoginController::class )->names('loginu');

Route::get('/logout', [loginController::class,'logout'])->name('home.logout');

// RUTA DE LAS CATEGORIAS DEL FRONT-END

// RUTAS DE LAS ENCUESTAS

Route::get('/categorias', [HomeCategoriasController::class, 'index'])->name('home.categorias')->middleware('status','prevent-back-history');

Route::get('/categorias/{id}', [HomeCategoriasController::class, 'showCategoria'])->name('home.categorias.show')->middleware('status','prevent-back-history');

Route::get('home/encuesta/categoria/{categoria}/municipio/{municipio}', [HomeEncuestaController::class, 'showEncuesta'])->name('home.encuesta.show')->middleware('status','prevent-back-history');

Route::get('home/encuesta/categoria/{categoria}/encuesta/{encuesta}/municipio/{municipio?}', [HomeEncuestaController::class, 'homeEncuesta'])->name('home.encuesta.index')->middleware('status','prevent-back-history');

Route::post('home/encuesta/respuestas/create',[HomeEncuestaController::class, 'storeRespuesta'])->name('home.encuesta.store')->middleware('status','prevent-back-history');

Route::get('home/encuesta/agradecimientos/{id}', [HomeEncuestaController::class, 'agradecimiento'])->name('home.encuesta.agradecimiento')->middleware('status','prevent-back-history');

Route::middleware(['auth:sanctum', 'verified'])->get('dash', function () {

    return view('dash.index');
    
})->name('dash');

// RUTA CRUD PARA LOS USUARIOS
Route::resource('usuarios', UsuariosController::class)->names('admin.usuarios');

// RUTA CRUD PARA LAS CATEGORIAS
Route::middleware(['auth:sanctum', 'verified'])->resource('admin/categorias', CategoriasController::class)->names('admin.categorias');

// RUTA CRUD PARA LOS MUNICIPIOS
Route::resource('municipios', MunicipiosController::class)->names('admin.municipios');

// RUTA CRUD PARA LOS ROLES
Route::resource('roles', RolesController::class)->names('admin.roles');

// RUTA CRUD PARA LOS PERMISOS
Route::resource('permisos', PermisosController::class)->names('admin.permisos');

// REPORTES
Route::resource('reportes', ReportesController::class)->names('admin.reporte');

Route::get('reporte/estatal', [ReportesController::class, 'indexEstatal'])->name('admin.reporte.estatal');

Route::get('reporte/municipal', [ReportesController::class, 'indexMunicipal'])->name('admin.reporte.municipal');

