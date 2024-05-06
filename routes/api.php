<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PuntoVentaModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('v1/productos',[ProductosController::class,'apiIndex'])->name('api.index');

//Route::get('v1/ventasGerencia',[ProductosController::class,'apiIndex'])->name('api.index');

Route::get('v1/editar/{id}',[ProductosController::class,'edit'])->name('api.edit');



Route::get('v1/ventaspunto/todo',[PuntoVentaModelController::class,'ventas']); //CONSULTA

Route::post('v1/crear-venta',[PuntoVentaModelController::class,'store']);  //CREAR VENTA




Route::post('v1/crear-producto',[ProductosController::class,'store']);

Route::put('v1/editar-producto/{id}' , [ProductosController::class,'update']);

Route::delete('v1/eliminar-producto/{id}',[ProductosController::class,'destroy']);



Route::get('/v1/productos/masvendidos',[PuntoVentaModelController::class,'consultauno']);

Route::get('/v1/3productos/masvendidos',[PuntoVentaModelController::class,'consultaunodos']);
Route::post('/v1/productos/fechaconsulta',[PuntoVentaModelController::class,'consultadosPorFecha']);
