<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use App\Http\Resources\TokenCollection;

class TokenController extends Controller
{
    public function index()
    {
        $token = Token::all();
        return new TokenCollection($token);
    }

    public function show($ID)
    {
        $token = Token::find($ID);

        if ($token) {
            return response()->json($token, 200);
        } else {
            return response()->json(['message' => 'Token no encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID' => 'integer',
            'TOKEN' => 'string',
            'FECHAVENCIMIENTO' => 'string',
            'FECHACREACION' => 'string',
            'ULTIMACONEXION' => 'string',
            'USUARIO_ID' => 'integer',
        ]);

        try {
            $token = Token::create([
            'ID' => $request->ID,
            'TOKEN' => $request->TOKEN,
            'FECHAVENCIMIENTO' => $request->FECHAVENCIMIENTO,
            'FECHACREACION' => $request->FECHACREACION,
            'ULTIMACONEXION' => $request->ULTIMACONEXION,
            'USUARIO_ID' => $request->USUARIO_ID
            ]);

            return response()->json($token, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al guardar el token: ' . $e->getMessage()], 500);
        }
    }
}
