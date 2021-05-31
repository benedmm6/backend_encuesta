<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\MunicipiosController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('dash', function () {
    return view('dash.index');
})->name('dash');

// RUTA CRUD PARA LAS CATEGORIAS
Route::middleware(['auth:sanctum', 'verified'])->resource('categorias', CategoriasController::class)->names('admin.categorias');

// RUTA CRUD PARA LOS MUNICIPIOS
Route::middleware(['auth:sanctum', 'verified'])->resource('municipios', MunicipiosController::class)->names('admin.municipios');