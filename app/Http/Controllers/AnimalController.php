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
        return $this->animaldbController->obtenerAnimal();
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
        $request->validate([
            'NOMBRE' => 'required',
            'DESCRIPCION' => 'required',
            'IMAGEN' => 'required',
            'COLOR_ID' => 'required',
            'TAMAÑO_ID' => 'required',
            'ESPECIE_ID' => 'required',
        ]);

        return $this->animaldbController->crearAnimal($request);
    }
    public function show($id)
    {
        return $this->animaldbController->obtenerAnimalPorID($id);
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'NOMBRE' => 'string',
            'DESCRIPCION' => 'string',
            'IMAGEN' => 'string',
            'COLOR_ID' => 'integer',
            'TAMAÑO_ID' => 'integer',
            'ESPECIE_ID' => 'integer',
        ]);

        return $this->animaldbController->actualizarAnimal($request, $animal->ID);
    }

    public function destroy(Animal $animal)
    {
        return $this->animaldbController->eliminarAnimal($animal->ID);
    }
}
