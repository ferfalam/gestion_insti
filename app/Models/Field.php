<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    

    protected $fillable = [
        'systemName',
        'name',
        'abbreviation',
        'description',
        'offer', // fichier à discuter
    ];
}
