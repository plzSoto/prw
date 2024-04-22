<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamaño extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID';

    protected $table = 't_tamaño';

    protected $fillable = [
        'ID',
        'TAMAÑO',
    ];

    public function animales()
    {
        return $this->hasMany(Animal::class, 'COLOR_ID');
    }
}

