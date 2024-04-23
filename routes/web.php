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

Route::get("/avisos", function () {
    return view("Aviso.aviso");
});

Route::get("/formAviso", function () {
    return view("Aviso.formAviso");
});

Route::get('/editAnimal', function () {
    return view('Animal.editAnimal');
});

Route::get("/animales", function () {
    return view("Animal.animal");
});

Route::get("/formAnimal", function () {
    return view("Animal.formAnimal");
});

Route::get('/animal/edit/{id}', [AnimalController::class, 'edit'])->name('Animal.editAnimal');

Route::get('/animal', [AnimalController::class, 'vista']);

Route::post('/animal/store', [AnimalController::class, 'store']);

Route::get('/loadDataAnimal', [AnimalController::class, 'loadDataAnimal']);

Route::get('/formAnimal', [AnimalController::class, 'mostrarFormularioAnimales']);

Route::get('/editAnimal', [AnimalController::class, 'mostrarFormularioEdit']);

Route::delete('/animal/destroy/{id}', [AnimalController::class, 'destroy']);

Route::put('/animal/{id}', [AnimalController::class, 'update']);

Route::get('/api/animales/{id}', [AnimalController::class, 'show']);

Route::get('/animal/{id}', [AnimalController::class, 'show']);

Route::post('/aviso/store', [AvisoController::class, 'store']);

Route::get('/loadDataAviso', [AvisoController::class, 'loadDataAviso']);



