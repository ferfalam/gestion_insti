<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    // semestre_annee, semestre_cycle, annee_etude, type_enseignant/apprenant/personnel/UE/composition/stage/, nature_UE

    protected $fillable = [
        'name',
        'systemName',
        'content_type',
        'content_tag', 
        'status', // publié/nn publié
    ];
}
