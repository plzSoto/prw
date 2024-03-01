<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID';

    protected $table = 't_aviso';

    protected $fillable = [
        'FECHADESAPARECIDO',
        'LUGARDESAPARECIDO',
        'ANIMAL_ID',
        'CONTACTOEXTRA_ID',
        'ESTADO_ID',
    ];

    public function Animal()
    {
        return $this->belongsTo('App\Models\Animal', 'ANIMAL_ID');
    }

    public function ContactoExtra()
    {
        return $this->belongsTo('App\Models\ContactoExtra', 'CONTACTOEXTRA_ID');
    }

    public function Estado()
    {
        return $this->belongsTo('App\Models\Estado', 'ESTADO_ID');
    }
}
