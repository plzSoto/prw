<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Color;
use App\Models\Tamaño;
use App\Models\Especie;
use Illuminate\Http\Request;
use App\Exceptions\AnimalErrorException;

class AnimalController extends Controller
{
    public function index()
    {
        try {
            $animal = Animal::all();
            return response()->json($animal);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        $animal = Animal::all();
        $color = Color::all();
        $tamaño = Tamaño::all();
        $especie = Especie::all();

        return view('formAnimal', compact('animal', 'color', 'tamaño', 'especie'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'ID' => 'required|integer',
                'NOMBRE' => 'required|string',
                'DESCRIPCION' => 'required|string',
                'IMAGEN' => 'required|string',
                'COLOR_ID' => 'required|integer',
                'TAMAÑO_ID' => 'required|integer',
                'ESPECIE_ID' => 'required|integer',
            ]);

            $animal = Animal::create($request->all());

            return redirect('animal')->with('success', 'Animal creado correctamente');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $animal = Animal::find($id);

            if ($animal) {
                return response()->json($animal);
            } else {
                throw new AnimalErrorException();
            }
        } catch (AnimalErrorException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    public function update(Request $request, Animal $animal)
    {
        try {
            $request->validate([
                'ID' => 'integer',
                'NOMBRE' => 'string',
                'DESCRIPCION' => 'string',
                'IMAGEN' => 'string',
                'COLOR_ID' => 'integer',
                'TAMAÑO_ID' => 'integer',
                'ESPECIE_ID' => 'integer',
            ]);

            $animal->update($request->all());

            return response()->json(['message' => 'Animal actualizado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(Animal $animal)
    {
        try {
            if ($animal) {
                $animal->delete();
                return response()->json(['message' => 'Animal eliminado correctamente']);
            } else {
                throw new AnimalErrorException();
            }
        } catch (AnimalErrorException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
