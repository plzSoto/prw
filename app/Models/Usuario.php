<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID';

    protected $table = 't_usuario';

    protected $fillable = [
        'ID',
        'NOMBRE',
        'EMAIL',
        'CONTRASEÑA',
        'TELEFONO',
    ];

    public function tokens()
    {
        return $this->hasMany(Token::class, 'USUARIO_ID');
    }
}
