<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'T_USUARIO';
    
    public function tokens()
    {
        return $this->hasMany(Token::class, 'USUARIO_ID');
    }
}
