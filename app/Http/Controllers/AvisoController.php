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

    public function mostrarFormularioAvisos()
    {
        return view('Aviso/formAviso');
    }

    public function mostrarFormularioEditAvisos()
    {
        return view('Aviso/editAviso');
    }

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

    public function vista()
    {
        try {
            $avisos = Aviso::all();
            return view('Aviso.aviso', compact('avisos'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
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
                'FECHADESAPARECIDO' => 'required',
                'LUGARDESAPARECIDO' => 'required',
                'ANIMAL_ID' => 'required',
                'CONTACTOEXTRA_ID' => 'required',
                'ESTADO_ID' => 'required',
            ]);

            $aviso = new Aviso();
            $aviso->fill($request->all());
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
            $aviso = Aviso::findOrFail($id);
            return response()->json($aviso);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Aviso no encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $aviso = Aviso::findOrFail($id);

        $aviso->FECHADESAPARECIDO = $request->input('FECHADESAPARECIDO');
        $aviso->LUGARDESAPARECIDO = $request->input('LUGARDESAPARECIDO');
        $aviso->ANIMAL_ID = $request->input('ANIMAL_ID');
        $aviso->CONTACTOEXTRA_ID = $request->input('CONTACTOEXTRA_ID');
        $aviso->ESTADO_ID = $request->input('ESTADO_ID');

        $aviso->save();

        return response()->json(['message' => 'Aviso actualizado correctamente'], 200);
    }


    public function edit($id)
    {
        try {
            $aviso = Aviso::with('animal', 'contactoextra', 'estado')->findOrFail($id);
            return view('Aviso.editAviso', compact('aviso'));
        } catch (\Exception $e) {
            return redirect()->route('aviso.index')->with('error', 'Aviso no encontrado.');
        }
    }

    public function destroy($id)
    {
        try {
            $aviso = Aviso::findOrFail($id);
            $aviso->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error("Error al eliminar el Aviso: " . $e->getMessage());
            return response()->json(['error' => 'Error al eliminar el Aviso'], 500);
        }
    }

    public function destroyAvisoPorAnimal($animalId)
    {
        try {
            Aviso::where('ANIMAL_ID', $animalId)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error("Error al eliminar los avisos asociados al animal: " . $e->getMessage());
            return response()->json(['error' => 'Error al eliminar los avisos asociados al animal'], 500);
        }
    }

}
