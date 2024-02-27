<?php

use App\Http\Controllers\AvisoController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ContactoExtraController;
use App\Http\Controllers\TamañoController;
use App\Http\Controllers\UsuarioController;
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

Route::group(['prefix' => 'sosanimales'], function () {

    Route::apiResource('aviso', AvisoController::class);
    Route::apiResource('animal', AnimalController::class);
    Route::apiResource('color', ColorController::class);
    Route::apiResource('contactoextra', ContactoExtraController::class);
    Route::apiResource('especie', EspecieController::class);
    Route::apiResource('tamaño', TamañoController::class);
    Route::apiResource('token', TokenController::class);
    Route::apiResource('usuario', UsuarioController::class);

    Route::get('/aviso', [AvisoController::class, 'index']);
    Route::get('/animal', [AnimalController::class, 'index']);
    Route::get('/color', [ColorController::class, 'index']);
    Route::get('/contactoextra', [ContactoExtraController::class, 'index']);
    Route::get('/especie', [EspecieController::class, 'index']);
    Route::get('/estado', [EstadoController::class, 'index']);
    Route::get('/tamaño', [TamañoController::class, 'index']);
    Route::get('/token', [TokenController::class, 'index']);
    Route::get('/usuario', [UsuarioController::class, 'index']);
});
