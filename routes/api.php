<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/conta-fisica', ['App\Http\Controllers\ContaFisicaController', 'criarContaFisica']);
Route::post('/conta-juridica', ['App\Http\Controllers\ContaJuridicaController', 'criarContaJuridica']);
Route::get('/conta', ['App\Http\Controllers\ContaBancariaController', 'mostrarUsuario']);
Route::post('/login', ['App\Http\Controllers\AuthController', 'login']);

Route::post('/transferencia', ['App\Http\Controllers\ContaBancariaController', 'transferencia']);
