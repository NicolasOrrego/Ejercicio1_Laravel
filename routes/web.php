<?php

use App\Http\Controllers\DatosController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

//TODO: Imprimir informacion.
Route::get('datatable/lista', [DatosController::class, 'ObtenerInformacion'])->name('datatable.lista');

//TODO: Insertar nueva informacion.
Route::get('/add', function () {return view('CRUD.add');});
Route::post('registro/nuevo', [DatosController::class, 'crearRegistro'])->name('add.registro');

//TODO: Actualizar informacion.
Route::get('/datos/{id}/editar', [DatosController::class, 'modificarRegistro'])->name('edit.registro');
Route::put('/datos/{dato}', [DatosController::class, 'update'])->name('update.registro');

//TODO: Eliminar informacion.
Route::delete('/eliminar/registro/{id}', [DatosController::class, 'eliminarRegistro'])->name('delete.registro');

//TODO: Grafico.
Route::get('/grafico', [DatosController::class, 'index']);
Route::get('/datos', [DatosController::class, 'obtenerDatos']);










