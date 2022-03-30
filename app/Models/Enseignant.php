<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomEnseignant',
        'nomUe',
        'credit',
        'ct',
        'td',
        'tp',
        'gpe',
        'mp',
        'me',
        'tpe'
   ];
}
