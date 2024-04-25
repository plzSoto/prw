<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AvisoController;

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

Route::get("/", function () {
    return view("Login.login");
});

Route::get('/loadDataAviso', [AvisoController::class, 'loadDataAviso']);

Route::get('/loadDataAnimal', [AnimalController::class, 'loadDataAnimal']);

Route::get('/aviso', [AvisoController::class, 'vista']);

Route::get('/animal', [AnimalController::class, 'vista']);

Route::get('/formAnimal', [AnimalController::class, 'mostrarFormularioAnimales']);

Route::get('/formAviso', [AvisoController::class, 'mostrarFormularioAvisos']);

Route::get('/editAnimal', [AnimalController::class, 'mostrarFormularioEditAnimales']);

Route::get('/editAviso', [AvisoController::class, 'mostrarFormularioEditAvisos']);

Route::post('/animal/store', [AnimalController::class, 'store']);

Route::post('/aviso/store', [AvisoController::class, 'store']);

Route::delete('/animal/destroy/{id}', [AnimalController::class, 'destroy']);

Route::delete('/aviso/destroy/{id}', [AvisoController::class, 'destroy']);

Route::put('/animal/{id}', [AnimalController::class, 'update']);

Route::put('/aviso/{id}', [AvisoController::class, 'update']);

Route::get('/animal/edit/{id}', [AnimalController::class, 'edit'])->name('Animal.editAnimal');

Route::get('/aviso/edit/{id}', [AvisoController::class, 'edit'])->name('Aviso.editAviso');






