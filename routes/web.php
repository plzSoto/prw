<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\ContactoExtraController;
use App\Http\Controllers\UsuarioController;

Route::get("/login", function () {
    return view("Login.login");
});
Route::get('/login', [UsuarioController::class, 'vista'])->name('login');
Route::post('/login', [UsuarioController::class, 'vista']);
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');
// Route::post('/verificarUsuario', [UsuarioController::class, 'verificarUsuario'])->name('verificarUsuario');


Route::get('/loadDataAviso', [AvisoController::class, 'loadDataAviso']);
Route::get('/loadDataAnimal', [AnimalController::class, 'loadDataAnimal']);

Route::get('/aviso', [AvisoController::class, 'vista'])->name('aviso');
Route::get('/animal', [AnimalController::class, 'vista'])->name('animal');
Route::get('/contactoExtra', [ContactoExtraController::class, 'vista'])->name('contactoExtra');
Route::get('/formAnimal', [AnimalController::class, 'mostrarFormularioAnimales'])->name('formAnimal');
Route::get('/formAviso', [AvisoController::class, 'mostrarFormularioAvisos'])->name('formAviso');
Route::get('/formContactoExtra', [ContactoExtraController::class, 'mostrarFormularioContactosExtras'])->name('formContactoExtra');
Route::get('/editAnimal', [AnimalController::class, 'mostrarFormularioEditAnimales']);
Route::get('/editAviso', [AvisoController::class, 'mostrarFormularioEditAvisos']);
Route::get('/editContactoExtra', [ContactoExtraController::class, 'mostrarFormularioEditContactosExtras']);

Route::post('/animal/store', [AnimalController::class, 'store']);
Route::post('/aviso/store', [AvisoController::class, 'store']);
Route::post('/contactoExtra/store', [ContactoExtraController::class, 'store']);

Route::delete('/animal/destroy/{id}', [AnimalController::class, 'destroy']);
Route::delete('/aviso/{id}', [AvisoController::class, 'destroy']);
Route::delete('/contactoExtra/{id}', [ContactoExtraController::class, 'destroy']);
Route::delete('/aviso/dpAnimal/{animalId}', [AvisoController::class, 'destroyAvisoPorAnimal']);

Route::put('/animal/{id}', [AnimalController::class, 'update']);
Route::put('/aviso/{id}', [AvisoController::class, 'update']);
Route::put('/contactoExtra/{id}', [ContactoExtraController::class, 'update']);

Route::get('/animal/edit/{id}', [AnimalController::class, 'edit'])->name('Animal.editAnimal');
Route::get('/aviso/edit/{id}', [AvisoController::class, 'edit'])->name('Aviso.editAviso');
Route::get('/contactoExtra/edit/{id}', [ContactoExtraController::class, 'edit'])->name('ContactoExtra.editContactoExtra');
