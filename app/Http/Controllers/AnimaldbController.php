<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimaldbController extends Controller
{
    public function obtenerAnimal()
    {
        // Obtener todos los animales con sus relaciones
        $animal = DB::table('t_animal')
            ->leftJoin('t_color', 't_animal.COLOR_ID', '=', 't_color.ID')
            ->leftJoin('t_especie', 't_animal.ESPECIE_ID', '=', 't_especie.ID')
            ->leftJoin('t_tamaño', 't_animal.TAMAÑO_ID', '=', 't_tamaño.ID')
            ->select('t_animal.*', 't_color.COLOR', 't_especie.ESPECIE', 't_tamaño.TAMAÑO')
            ->get();

        return response()->json($animal);
    }

    public function obtenerAnimalPorID($ID)
    {
        // Obtener un animal por su ID
        $animal = DB::table('t_animal')
            ->leftJoin('t_color', 't_animal.COLOR_ID', '=', 't_color.ID')
            ->leftJoin('t_especie', 't_animal.ESPECIE_ID', '=', 't_especie.ID')
            ->leftJoin('t_tamaño', 't_animal.TAMAÑO_ID', '=', 't_tamaño.ID')
            ->select('t_animal.*', 't_color.COLOR', 't_especie.ESPECIE', 't_tamaño.TAMAÑO')
            ->where('t_animal.ID', '=', $ID)
            ->first();

        return response()->json($animal);
    }

    public function crearAnimal(Request $request)
{
    // Crear un nuevo animal en la base de datos
    $animalID = DB::table('t_animal')->insertGetId([
        'NOMBRE' => $request->input('NOMBRE'), // Corregido el nombre del campo
        'DESCRIPCION' => $request->input('DESCRIPCION'),
        'IMAGEN' => $request->input('IMAGEN'),
        'COLOR_ID' => $request->input('COLOR_ID'),
        'TAMAÑO_ID' => $request->input('TAMAÑO_ID'),
        'ESPECIE_ID' => $request->input('ESPECIE_ID'),
    ]);

    // Obtener el animal recién creado con las relaciones
    $animal = DB::table('t_animal')
        ->leftJoin('t_color', 't_animal.COLOR_ID', '=', 't_color.ID')
        ->leftJoin('t_especie', 't_animal.ESPECIE_ID', '=', 't_especie.ID')
        ->leftJoin('t_tamaño', 't_animal.TAMAÑO_ID', '=', 't_tamaño.ID')
        ->select('t_animal.*', 't_color.COLOR', 't_especie.ESPECIE', 't_tamaño.TAMAÑO')
        ->where('t_animal.ID', '=', $animalID)
        ->first();

    return response()->json($animal);
}


    public function eliminarAnimal($ID)
    {
        // Eliminar un animal de la base de datos
        DB::table('t_animal')->where('ID', '=', $ID)->delete();

        return response()->json(['success' => true]);
    }

    public function actualizarAnimal(Request $request, $ID)
    {
        // Actualizar el animal en la base de datos
        $datos = $request->only(['NOMBRE', 'DESCRIPCION', 'IMAGEN', 'COLOR_ID', 'TAMAÑO_ID', 'ESPECIE_ID']);
        DB::table('t_animal')->where('ID', '=', $ID)->update($datos);

        $animal = DB::table('t_animal')
            ->leftJoin('t_color', 't_animal.COLOR_ID', '=', 't_color.ID')
            ->leftJoin('t_especie', 't_animal.ESPECIE_ID', '=', 't_especie.ID')
            ->leftJoin('t_tamaño', 't_animal.TAMAÑO_ID', '=', 't_tamaño.ID')
            ->select('t_animal.*', 't_color.COLOR', 't_especie.ESPECIE', 't_tamaño.TAMAÑO')
            ->where('t_animal.ID', '=', $ID)
            ->first();

        return response()->json($animal);
    }

    public function editarAnimal($ID)
    {
        $animal = DB::table('t_animal')
            ->leftJoin('t_color', 't_animal.COLOR_ID', '=', 't_color.ID')
            ->leftJoin('t_especie', 't_animal.ESPECIE_ID', '=', 't_especie.ID')
            ->leftJoin('t_tamaño', 't_animal.TAMAÑO_ID', '=', 't_tamaño.ID')
            ->select('t_animal.*', 't_color.COLOR', 't_especie.ESPECIE', 't_tamaño.TAMAÑO')
            ->where('t_animal.ID', '=', $ID)
            ->first();

        $colores = DB::table('t_color')->get();
        $especies = DB::table('t_especie')->get();
        $tamaños = DB::table('t_tamaño')->get();

        return view('Animal.editarAnimal', compact('animal', 'colores', 'especies', 'tamaños'));
    }
}
