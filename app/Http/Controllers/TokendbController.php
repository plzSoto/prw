<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Carbon\Carbon;

class TokenDBController extends Controller
{
    public function guardarToken($usuario_id, $token)
    {
        $tokenModel = new Token();
        $tokenModel->TOKEN = $token;
        $tokenModel->FECHACREACION = Carbon::now();
        $tokenModel->FECHAVENCIMIENTO = Carbon::now()->addHours(1);
        $tokenModel->USUARIO_ID = $usuario_id;
        $tokenModel->save();
    }

    public function validarToken($token)
    {
        $tokenModel = Token::where('TOKEN', $token)
            ->where('FECHAVENCIMIENTO', '>', Carbon::now())
            ->first();

        return $tokenModel !== null;
    }

    public function eliminarToken($token)
    {
        Token::where('TOKEN', $token)->delete();
    }
}
