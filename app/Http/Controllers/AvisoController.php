<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use App\Models\Animal;
use App\Models\ContactoExtra;
use App\Models\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\AvisodbController;

class AvisoController extends Controller
{
    protected $avisodbController;

    public function __construct(AvisodbController $avisodbController)
    {
        $this->avisodbController = $avisodbController;
    }

    public function index()
    {
        try {
            return response()->json($this->avisodbController->obtenerAviso());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function loadDataAviso()
    {
        $animal = Animal::all();
        $contactoextra = ContactoExtra::all();
        $estado = Estado::all();

        return response()->json([
            'estado' => $estado,
            'animal' => $animal,
            'contactoextra' => $contactoextra
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'FECHADESAPARECIDO' => 'date',
                'LUGARDESAPARECIDO' => 'string',
                'ANIMAL_ID' => 'integer',
                'CONTACTOEXTRA_ID' => 'integer',
                'ESTADO_ID' => 'integer',
            ]);

            $aviso = new Aviso();
            $aviso->FECHADESAPARECIDO = $request->input('FECHADESAPARECIDO');
            $aviso->LUGARDESAPARECIDO = $request->input('LUGARDESAPARECIDO');
            $aviso->ANIMAL_ID = $request->input('ANIMAL_ID');
            $aviso->CONTACTOEXTRA_ID = $request->input('CONTACTOEXTRA_ID');
            $aviso->ESTADO_ID = $request->input('ESTADO_ID');
            $aviso->save();

            return response()->json(['message' => 'Aviso creado correctamente'], 200);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }

    public function show($id)
    {
        try {
            return $this->avisodbController->obtenerAvisoPorID($id);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function update(Request $request, Aviso $aviso)
    {
        try {
            $request->validate([
                'FECHADESAPARECIDO' => 'date',
                'LUGARDESAPARECIDO' => 'string',
                'ANIMAL_ID' => 'integer',
                'CONTACTOEXTRA_ID' => 'integer',
                'ESTADO_ID' => 'integer',
            ]);

            return $this->avisodbController->actualizarAviso($request, $aviso->ID);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(Aviso $aviso)
    {
        try {
            return $this->avisodbController->eliminarAviso($aviso->ID);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
