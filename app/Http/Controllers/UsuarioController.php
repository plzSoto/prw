<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Token;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function verificarUsuario(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'password' => 'required|string',
        ]);

        $usuario = Usuario::where('nombre', $request->nombre)->first();

        if ($usuario && password_verify($request->password, $usuario->password)) {
            $token = $this->generarToken($usuario->id);

            return response()->json([
                'token' => $token,
                'usuario' => $usuario,
            ], 200);
        } else {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }
    }

    private function generarToken($usuarioId)
    {
        $token = uniqid();

        $nuevoToken = new Token();
        $nuevoToken->token = $token;
        $nuevoToken->usuario_id = $usuarioId;
        $nuevoToken->fecha_expiracion = Carbon::now()->addHours(1);
        $nuevoToken->save();

        return $token;
    }

    public function vista()
    {
        try {
            $usuario = Usuario::all();
            return view('Login.login', compact('usuario'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function index()
    {
        try {
            $usuario = Usuario::all();
            return response()->json($usuario);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            return response()->json($usuario);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }
}

