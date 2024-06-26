<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoExtra extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID';

    protected $table = 't_contactoextra';

    protected $fillable = [
        'ID',
        'NOMBRE',
        'TELEFONO',
        'EMAIL',
    ];
}
