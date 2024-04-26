<?php

namespace App\Http\Controllers;

use App\Models\Contactoextra;
use Illuminate\Http\Request;

class ContactoExtraController extends Controller
{

    public function mostrarFormularioContactosExtras()
    {
        return view('ContactoExtra/formContactoExtra');
    }

    public function mostrarFormularioEditContactosExtras()
    {
        return view('ContactoExtra/editContactoExtra');
    }

    public function vista()
    {
        try {
            $contactosExtras = ContactoExtra::all();
            return view('ContactoExtra.contactoExtra', compact('contactosExtras'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function index()
    {
        try {
            $contactosExtras = Contactoextra::all();
            return response()->json($contactosExtras);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'NOMBRE' => 'required',
                'TELEFONO' => 'required',
                'EMAIL' => 'required',
            ]);

            $contactoExtra = new Contactoextra();
            $contactoExtra->fill($request->all());
            $contactoExtra->save();

            return response()->json(['message' => 'Contacto extra creado correctamente'], 200);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }

    public function show($id)
    {
        try {
            $contactoExtra = ContactoExtra::findOrFail($id);
            return response()->json($contactoExtra);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Contacto extra no encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $contactoExtra = ContactoExtra::findOrFail($id);

        $contactoExtra->NOMBRE = $request->input('NOMBRE');
        $contactoExtra->TELEFONO = $request->input('TELEFONO');
        $contactoExtra->EMAIL = $request->input('EMAIL');

        $contactoExtra->save();

        return response()->json(['message' => 'Contacto extra actualizado correctamente'], 200);
    }

    public function edit($id)
    {
        try {
            $contactoExtra = Contactoextra::findOrFail($id);
            return view('ContactoExtra.editContactoExtra', compact('contactoExtra'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $contactoExtra = ContactoExtra::findOrFail($id);
            $contactoExtra->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error("Error al eliminar el contacto extra: " . $e->getMessage());
            return response()->json(['error' => 'Error al eliminar el contacto extra'], 500);
        }
    }
}
