<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joya extends Model
{
    protected $table = 'joyas';

    protected $fillable = [
        'pieza',
        'metal',
        'precio'
    ];
}
