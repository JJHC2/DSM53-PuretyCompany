<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController\EstadosApiController;
use App\Http\Controllers\ApiController\MunicipiosApiController;
use App\Http\Controllers\ApiController\UsuariosApiController;
use App\Http\Controllers\ApiController\TipoApiController;
use App\Http\Controllers\ApiController\UbicacionApiController;
use App\Http\Controllers\ApiController\DepositoApiController;
use App\Http\Controllers\ApiController\SensorApiController;
use App\Http\Controllers\ApiController\RequisitosApiController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::apiResource('usuarios', UsuariosApiController::class);
Route::apiResource('tipo_usuario', TipoApiController::class);
Route::apiResource('ubicacion', UbicacionApiController::class);
Route::apiResource('deposito', DepositoApiController::class);
Route::apiResource('sensor', SensorApiController::class);
Route::apiResource('requisitos', RequisitosApiController::class);
Route::apiResource('estados', EstadosApiController::class);
Route::apiResource('municipios', MunicipiosApiController::class);
