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

    Route::post('/contactoextra', [ContactoExtraController::class, 'store']);
    Route::post('/token', [TokenController::class, 'store']);
    Route::post('/aviso', [AvisoController::class, 'store']);
    Route::post('/animal', [AnimalController::class, 'store']);
    Route::post('/usuario', [UsuarioController::class, 'store']);

    Route::delete('/aviso/{ID}', [AvisoController::class, 'destroy']);
    Route::delete('/animal/{ID}', [AnimalController::class, 'destroy']);
    Route::delete('/contactoextra/{ID}', [ContactoExtraController::class, 'destroy']);
    Route::delete('/token/{ID}', [TokenController::class, 'destroy']);
    Route::delete('/usuario/{ID}', [UsuarioController::class, 'destroy']);
    Route::delete('/aviso/dpAnimal/{animalId}', [AvisoController::class, 'destroyAvisoPorAnimal']);

    Route::put('/aviso/{ID}', [AvisoController::class, 'update']);
    Route::put('/animal/{ID}', [AnimalController::class, 'update']);
    Route::put('/contactoextra/{ID}', [ContactoExtraController::class, 'update']);
    Route::put('/token/{ID}', [TokenController::class, 'update']);
    Route::put('/usuario/{ID}', [UsuarioController::class, 'update']);

    Route::get('/aviso/{ID}', [AvisoController::class, 'show']);
    Route::get('/animal/{ID}', [AnimalController::class, 'show']);
    Route::get('/contactoextra/{ID}', [ContactoExtraController::class, 'show']);
    Route::get('/token/{ID}', [TokenController::class, 'show']);
    Route::get('/usuario/{ID}', [UsuarioController::class, 'show']);
});
