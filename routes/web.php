<?php

use Illuminate\Support\Facades\Route;

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

Route::get("/aviso", function () {
    return view("Aviso.aviso");
});

Route::get("/animal", function () {
    return view("Animal.animal");
});
