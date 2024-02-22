<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'imagen',
        'descripcion',
        'color_id',
        'tamaño_id',
        'especie_id',
    ];
}
