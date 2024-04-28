<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactoExtraController extends Controller
{
    public function obtenerContactoExtra()
    {
        $contactosExtras = DB::table('t_contactoextra')->get();

        return response()->json($contactosExtras);
    }

    public function obtenerContactoExtraPorID($ID)
    {
        $contactoExtra = DB::table('t_contactoextra')->where('ID', $ID)->first();

        return response()->json($contactoExtra);
    }

    public function crearContactoExtra(Request $request)
    {
        // Crear un nuevo contacto extra en la base de datos
        $contactoExtraID = DB::table('t_contactoextra')->insertGetId([
            'NOMBRE' => $request->input('NOMBRE'),
            'TELEFONO' => $request->input('TELEFONO'),
            'EMAIL' => $request->input('EMAIL'),
        ]);

        // Obtener el contacto extra recién creado
        $contactoExtra = DB::table('t_contactoextra')->where('ID', $contactoExtraID)->first();

        return response()->json($contactoExtra);
    }

    public function eliminarContactoExtra($ID)
    {
        // Eliminar un contacto extra de la base de datos
        DB::table('t_contactoextra')->where('ID', $ID)->delete();

        return response()->json(['success' => true]);
    }

    public function actualizarContactoExtra(Request $request, $ID)
    {
        // Actualizar un contacto extra en la base de datos
        $datos = $request->only(['NOMBRE', 'TELEFONO', 'EMAIL']);
        DB::table('t_contactoextra')->where('ID', $ID)->update($datos);

        $contactoExtra = DB::table('t_contactoextra')->where('ID', $ID)->first();

        return response()->json($contactoExtra);
    }

    public function editarContactoExtra($ID)
    {
        // Obtener el contacto extra para editar y cargar las vistas necesarias
        $contactoExtra = DB::table('t_contactoextra')->where('ID', $ID)->first();

        return view('ContactoExtra.editarContactoExtra', compact('contactoExtra'));
    }
}
