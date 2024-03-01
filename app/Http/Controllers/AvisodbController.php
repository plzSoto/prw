<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvisodbController extends Controller
{
    public function obtenerAviso()
    {
        // Obtener todos los avisos con sus relaciones
        $aviso = DB::table('t_aviso')
            ->leftJoin('t_animal', 't_aviso.ANIMAL_ID', '=', 't_animal.ID')
            ->leftJoin('t_contactoextra', 't_aviso.CONTACTOEXTRA_ID', '=', 't_contactoextra.ID')
            ->leftJoin('t_estado', 't_aviso.ESTADO_ID', '=', 't_estado.ID')
            ->select('t_aviso.*', 't_animal.NOMBRE as NOMBRE_ANIMAL', 't_contactoextra.NOMBRE as NOMBRE_CONTACTO', 't_estado.ESTADO')
            ->get();

        return response()->json($aviso);
    }

    public function obtenerAvisoPorID($ID)
    {
        // Obtener un aviso por su ID
        $aviso = DB::table('t_aviso')
            ->leftJoin('t_animal', 't_aviso.ANIMAL_ID', '=', 't_animal.ID')
            ->leftJoin('t_contactoextra', 't_aviso.CONTACTOEXTRA_ID', '=', 't_contactoextra.ID')
            ->leftJoin('t_estado', 't_aviso.ESTADO_ID', '=', 't_estado.ID')
            ->select('t_aviso.*', 't_animal.NOMBRE as NOMBRE_ANIMAL', 't_contactoextra.NOMBRE as NOMBRE_CONTACTO', 't_estado.ESTADO')
            ->where('t_aviso.ID', '=', $ID)
            ->first();

        return response()->json($aviso);
    }

    public function crearAviso(Request $request)
    {
        // Crear un nuevo aviso en la base de datos
        $avisoID = DB::table('t_aviso')->insertGetId([
            'FECHADESAPARECIDO' => $request->input('FECHADESAPARECIDO'),
            'LUGARDESAPARECIDO' => $request->input('LUGARDESAPARECIDO'),
            'ANIMAL_ID' => $request->input('ANIMAL_ID'),
            'CONTACTOEXTRA_ID' => $request->input('CONTACTOEXTRA_ID'),
            'ESTADO_ID' => $request->input('ESTADO_ID'),
        ]);

        // Obtener el aviso recién creado con las relaciones
        $aviso = DB::table('t_aviso')
            ->leftJoin('t_animal', 't_aviso.ANIMAL_ID', '=', 't_animal.ID')
            ->leftJoin('t_contactoextra', 't_aviso.CONTACTOEXTRA_ID', '=', 't_contactoextra.ID')
            ->leftJoin('t_estado', 't_aviso.ESTADO_ID', '=', 't_estado.ID')
            ->select('t_aviso.*', 't_animal.NOMBRE as NOMBRE_ANIMAL', 't_contactoextra.NOMBRE as NOMBRE_CONTACTO', 't_estado.ESTADO')
            ->where('t_aviso.ID', '=', $avisoID)
            ->first();

        return response()->json($aviso);
    }

    public function eliminarAviso($ID)
    {
        // Eliminar un aviso de la base de datos
        DB::table('t_aviso')->where('ID', '=', $ID)->delete();

        return response()->json(['success' => true]);
    }

    public function actualizarAviso(Request $request, $ID)
    {
        // Actualizar el aviso en la base de datos
        $datos = $request->only(['FECHADESAPARECIDO', 'LUGARDESAPARECIDO', 'ANIMAL_ID', 'CONTACTOEXTRA_ID', 'ESTADO_ID']);
        DB::table('t_aviso')->where('ID', '=', $ID)->update($datos);

        // Obtener el aviso actualizado con las relaciones
        $aviso = DB::table('t_aviso')
            ->leftJoin('t_animal', 't_aviso.ANIMAL_ID', '=', 't_animal.ID')
            ->leftJoin('t_contactoextra', 't_aviso.CONTACTOEXTRA_ID', '=', 't_contactoextra.ID')
            ->leftJoin('t_estado', 't_aviso.ESTADO_ID', '=', 't_estado.ID')
            ->select('t_aviso.*', 't_animal.NOMBRE', 't_contactoextra.NOMBRE', 't_estado.ESTADO')
            ->where('t_aviso.ID', '=', $ID)
            ->first();

        return response()->json($aviso);
    }

    public function editarAviso($ID)
    {
        $aviso = DB::table('t_aviso')
            ->leftJoin('t_animal', 't_aviso.ANIMAL_ID', '=', 't_animal.ID')
            ->leftJoin('t_contactoextra', 't_aviso.CONTACTOEXTRA_ID', '=', 't_contactoextra.ID')
            ->leftJoin('t_estado', 't_aviso.ESTADO_ID', '=', 't_estado.ID')
            ->select('t_aviso.*', 't_animal.NOMBRE', 't_contactoextra.NOMBRE', 't_estado.ESTADO')
            ->where('t_aviso.ID', '=', $ID)
            ->first();

        $animales = DB::table('t_animal')->get();
        $contactos = DB::table('t_contactoextra')->get();
        $estados = DB::table('t_estado')->get();

        return view('Aviso.editarAviso', compact('aviso', 'animales', 'contactos', 'estados'));
    }
}
