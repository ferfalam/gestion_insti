<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    //chefService/Adjoint, collaborateur, chefCollaborateur, chefDivision, responsableClasse/Adjoint

    protected $fillable = [
        'name',
        'description',
    ];
}
