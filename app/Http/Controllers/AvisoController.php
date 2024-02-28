<?php

namespace App\Http\Controllers;

use App\Models\Aviso;
use App\Models\Animal;
use App\Models\ContactoExtra;
use App\Models\Estado;
use Illuminate\Http\Request;
use App\Exceptions\AvisoErrorException;

class AvisoController extends Controller
{
    public function index()
    {
        try {
            $aviso = Aviso::all();
            return response()->json($aviso);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        $aviso = Aviso::all();
        $animal = Animal::all();
        $contactoextra = ContactoExtra::all();
        $estado = Estado::all();

        return view('formAviso', compact('aviso', 'animal', 'contactoextra', 'estado'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'FECHADESAPARECIDO' => 'required|datetime',
                'LUGARDESAPARECIDO' => 'required|string',
                'ANIMAL_ID' => 'required|integer',
                'CONTACTOEXTRA_ID' => 'required|integer',
                'ESTADO_ID' => 'required|integer',
            ]);

            $aviso = Aviso::create($request->all());

            return redirect('avisos')->with('success', 'Aviso cargado correctamente');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'trace' => $e->getTrace()], 500);
        }
    }

    public function show($id)
    {
        try {
            $aviso = Aviso::find($id);

            if ($aviso) {
                return response()->json($aviso);
            } else {
                throw new AvisoErrorException();
            }
        } catch (AvisoErrorException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    public function update(Request $request, Aviso $aviso)
    {
        $request->validate([
            'FECHADESAPARECIDO' => 'datetime',
            'LUGARDESAPARECIDO' => 'string',
            'ANIMAL_ID' => 'integer',
            'CONTACTOEXTRA_ID' => 'integer',
            'ESTADO_ID' => 'integer',
        ]);

        $aviso->update($request->all());

        return response()->json(['message' => 'Aviso actualizado correctamente']);
    }

    public function destroy(Aviso $aviso)
    {
        try {
            if ($aviso) {
                $aviso->delete();
                return response()->json(['message' => 'Aviso eliminado correctamente']);
            } else {
                throw new AvisoErrorException();
            }
        } catch (AvisoErrorException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
