<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuariosDBController extends Controller
{
    public function obtenerUsuarios()
    {
        $usuario = DB::table('t_usuario')->get();
        return response()->json($usuario);
    }

    public function obtenerUsuarioPorId($id)
    {
        $usuario = DB::table('t_usuario')->where('ID', $id)->first();
        return response()->json($usuario);
    }
}
