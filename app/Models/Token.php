<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID';

    protected $table = 't_token';

    protected $fillable = [
        'ID',
        'TOKEN',
        'FECHAVENCIMIENTO',
        'FECHACREACION',
        'ULTIMACONEXION',
        'USUARIO_ID',
    ];
}
