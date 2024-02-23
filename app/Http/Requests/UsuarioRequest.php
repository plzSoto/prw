<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    public function validate()
    {
        return [
            'nombre' => 'required|string|max:45',
            'email' => 'required|email|max:50',
            'contrasena' => 'required|string|max:25',
            'telefono' => 'required|string|max:20',
        ];
    }
}
