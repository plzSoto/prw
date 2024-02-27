<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID';

    protected $table = 't_animal';

    protected $fillable = [
        'ID',
        'NOMBRE',
        'DESCRIPCION',
        'IMAGEN',
        'COLOR_ID',
        'TAMAÑO_ID',
        'ESPECIE_ID',
    ];
}
