<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/demandas', [DemandaController::class, 'index']); // Listar demandas
Route::post('/demandas', [DemandaController::class, 'store']); // Criar demanda
Route::put('/demandas/{id}', [DemandaController::class, 'update']); // Atualizar demanda
Route::delete('/demandas/{id}', [DemandaController::class, 'destroy']); // Excluir demanda