<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    use HasFactory;

    protected $fillable = [
        'lugardesaparecido',
        'fechadesaparecido',
        'animal_id',
        'contactoextra_id',
        'estado_id',
    ];
}
