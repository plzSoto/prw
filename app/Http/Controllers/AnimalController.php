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

    public function mostrarFormularioEditAnimales()
    {
        return view('Animal/editAnimal');
    }

    protected $animaldbController;

    public function __construct(animaldbController $animaldbController)
    {
        $this->animaldbController = $animaldbController;
    }

    public function index()
    {
        try {
            return response()->json($this->animaldbController->obtenerAnimal());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function vista()
    {
        try {
            $animales = Animal::all();
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
            $animal->fill($request->all());
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
            $animal = Animal::findOrFail($id);
            return response()->json($animal);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Animal no encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->NOMBRE = $request->input('NOMBRE');
        $animal->DESCRIPCION = $request->input('DESCRIPCION');
        $animal->IMAGEN = $request->input('IMAGEN');
        $animal->COLOR_ID = $request->input('COLOR_ID');
        $animal->TAMAÑO_ID = $request->input('TAMAÑO_ID');
        $animal->ESPECIE_ID = $request->input('ESPECIE_ID');
        $animal->save();

        return response()->json(['message' => 'Animal actualizado correctamente'], 200);
    }

    public function edit($id)
    {
        try {
            $animal = Animal::findOrFail($id);

            return view('Animal.editAnimal', compact('animal'));
        } catch (\Exception $e) {
            \Log::error("Error al obtener los datos del animal: " . $e->getMessage());
            return response()->json(['error' => 'Animal no encontrado'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $animal = Animal::findOrFail($id);
            $animal->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error("Error al eliminar el animal: " . $e->getMessage());
            return response()->json(['error' => 'Error al eliminar el animal'], 500);
        }
    }
}
