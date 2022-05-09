<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation', //integer
        'code',
        'CT',
        'TD',
        'TP',
        'generalId',
    ];
}
