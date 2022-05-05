<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FichesDeroulementCours extends Model
{

    use HasFactory;

    // semestre_annee, semestre_cycle, annee_etude, type_enseignant/apprenant/personnel/UE/composition/stage/, nature_UE

    protected $fillable = [
        'name',
        'surname',
        'studyYearsId',
        'fieldsId',
        'ueId',
        'dateDeroulement',
        'startTimeCours',
        'endTimeCours',
        'semestreId',
        'nature_ue',
        'observation',
    ];

}