<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID';

    protected $table = 't_color';

    protected $fillable = [
        'ID',
        'COLOR',
    ];

    public function animales()
    {
        return $this->hasMany(Animal::class, 'COLOR_ID');
    }
}
