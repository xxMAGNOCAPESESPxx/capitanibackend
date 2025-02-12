<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandaController;

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

Route::get('/demandas', [DemandaController::class, 'index']);

//var_dump("bateu aqui");die(0);
Route::post( '/demandas',[DemandaController::class, 'store']);

Route::put('/demandas', [DemandaController::class, 'update']);
Route::delete('/demandas', [DemandaController::class, 'destroy']);

Route::post('/test', function(Request $request) {
    return response()->json(['message' => 'Success', 'data' => $request->all()]);
});