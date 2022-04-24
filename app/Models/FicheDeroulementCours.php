<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FicheDeroulementCours extends Model
{

    use HasFactory;

    // semestre_annee, semestre_cycle, annee_etude, type_enseignant/apprenant/personnel/UE/composition/stage/, nature_UE

    protected $fillable = [
        'name',
        'surname',
        'study_years',
        'fields',
        'ue',
        'startCours',
        'endCours',
        'semestreAffected',
        // fiches_deroulement_cours'
        'nature_ue',
        'observation',
       
       
        // $table->enum('semestreAffected', ['easy', 'hard']);
        // $table->enum('nature_ue',['decouverte','specialite','fondamentale','libre']);
        // // $table->foreignId('generalId')->constrained('generals');
    ];
}