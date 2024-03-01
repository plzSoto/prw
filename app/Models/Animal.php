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

    public function Color()
    {
        return $this->belongsTo('App\Models\Color', 'COLOR_ID');
    }

    public function Especie()
    {
        return $this->belongsTo('App\Models\Especie', 'ESPECIE_ID');
    }

    public function Tamaño()
    {
        return $this->belongsTo('App\Models\Tamaño', 'TAMAÑO_ID');
    }
}
