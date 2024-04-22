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

    public function mostrarFormularioAnimales()
    {
        return view('Animal/formAnimal');
    }
    protected $animaldbController;

    public function __construct(AnimaldbController $animaldbController)
    {
        $this->animaldbController = $animaldbController;
    }

    public function index()
    {
        try {
            $animales = Animal::all(); // Obtener todos los animales desde el modelo Animal

            return view('Animal.animal', compact('animales'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    public function loadDataAnimal()
    {
        $color = Color::all();
        $tamaño = Tamaño::all();
        $especie = Especie::all();

        return response()->json([
            'color' => $color,
            'tamaño' => $tamaño,
            'especie' => $especie,
        ]);
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

            $animal = new Animal();
            $animal->NOMBRE = $request->input('NOMBRE');
            $animal->DESCRIPCION = $request->input('DESCRIPCION');
            $animal->IMAGEN = $request->input('IMAGEN');
            $animal->COLOR_ID = $request->input('COLOR_ID');
            $animal->TAMAÑO_ID = $request->input('TAMAÑO_ID');
            $animal->ESPECIE_ID = $request->input('ESPECIE_ID');
            $animal->save();

            return response()->json(['message' => 'Animal creado correctamente'], 200);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
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

    public function destroy($id)
    {
        try {
            $animal = Animal::findOrFail($id);

            // Eliminar el animal sin afectar las relaciones
            $animal->delete();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Error al eliminar el animal'], 500);
        }
    }
}

