<?php

use App\Http\Controllers\AvisoController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EspecieController;
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

Route::get('/login', function () {
    return view('login');
});

Route::apiResource('avisos', AvisoController::class);
Route::apiResource('animales', AnimalController::class);
Route::apiResource('colores', ColorController::class);
Route::apiResource('contactoextra', ContactoExtraController::class);
Route::apiResource('especies', EspecieController::class);
Route::apiResource('tamaños', TamañoController::class);
Route::apiResource('usuarios', UsuarioController::class);

Route::get('/avisos', function () {
    return view('avisos');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
