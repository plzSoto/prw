<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json(['usuario' => $usuario], 200);
    }
}
