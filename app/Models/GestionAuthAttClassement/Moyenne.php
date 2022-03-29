<?php

namespace App\Models\GestionAuthAttClassement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moyenne extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable=[
        "name",
        "genre",
        "filiere",
        "n_matricule",
        "moy_annee1",
        "moy_annee2",
        "moy_annee3",
        "moy_generale"
    ];
}
