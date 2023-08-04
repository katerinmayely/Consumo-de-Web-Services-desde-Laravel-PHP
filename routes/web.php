<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AlumnoController;

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
    return view('welcome');
});

//CREATE
Route::get('/alumnos/guardar/form', [AlumnoController::class, 'mostrar_form_crear']);
Route::post('/alumnos/guardar/store', [AlumnoController::class, 'guardar'])->name('alumno.guardar');

//READ
Route::get('/alumnos', [AlumnoController::class, 'obtener_alumnos'])->name('alumnos.mostrar');
Route::get('/alumnos/{id}', [AlumnoController::class, 'obtener_alumno'])->name('alumno.mostrar');

//UPDATE
Route::get('/alumnos/actualizar/form/{id}', [AlumnoController::class, 'mostrar_form_update']);
Route::get('/alumnos/actualizar/update', [AlumnoController::class, 'actualizar'])->name('alumno.actualizar');

//DELETE
Route::get('/alumnos/eliminar/{id}', [AlumnoController::class, 'eliminar_alumno']);

