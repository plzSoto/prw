<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID';

    protected $table = 't_estado';

    protected $fillable = [
        'ID',
        'ESTADO',
    ];
}
