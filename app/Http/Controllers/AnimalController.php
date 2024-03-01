<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Color;
use App\Models\Tamaño;
use App\Models\Especie;
use Illuminate\Http\Request;
use App\Http\Controllers\AnimaldbController;

class AnimalController extends Controller
{
    protected $animaldbController;

    public function __construct(AnimaldbController $animaldbController)
    {
        $this->animaldbController = $animaldbController;
    }

    public function index()
    {
        try {
            return $this->animaldbController->obtenerAnimal();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function create()
    {
        $color = Color::all();
        $tamaño = Tamaño::all();
        $especie = Especie::all();

        return view('formAnimal', compact('color', 'tamaño', 'especie'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'NOMBRE' => 'required',
                'DESCRIPCION' => 'required',
                'IMAGEN' => 'required',
                'COLOR_ID' => 'required',
                'TAMAÑO_ID' => 'required',
                'ESPECIE_ID' => 'required',
            ]);

            return $this->animaldbController->crearAnimal($request);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function show($id)
    {
        try {
            return $this->animaldbController->obtenerAnimalPorID($id);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function update(Request $request, Animal $animal)
    {
        try {
            $request->validate([
                'NOMBRE' => 'string',
                'DESCRIPCION' => 'string',
                'IMAGEN' => 'string',
                'COLOR_ID' => 'integer',
                'TAMAÑO_ID' => 'integer',
                'ESPECIE_ID' => 'integer',
            ]);

            return $this->animaldbController->actualizarAnimal($request, $animal->ID);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function destroy(Animal $animal)
    {
        try {
            return $this->animaldbController->eliminarAnimal($animal->ID);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
