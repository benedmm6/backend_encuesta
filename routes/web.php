<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('admin/usuarios', function () {
    return view('dash.usuarios');
})->name('usuarios');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/categorias', function () {
    return view('dash.categorias');
})->name('categorias');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/tramites', function () {
    return view('dash.tramites');
})->name('tramites');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/municipios', function () {
    return view('dash.municipios');
})->name('municipios');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/nueva/encuesta', function () {
    return view('dash.crearEncuesta');
})->name('createEncuesta');
