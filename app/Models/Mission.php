<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_enseignant',
        'qualiteId',
        'adressse',
        'date_naissance',
        'lieu',
        'nationalite',
        'grade',
        'ue',
        'pedagogicGroupsId',
        'academicYearsId',
        'missionHeure',
        'missionDuree',
        'startDate',
        'endDate'
    ];
}
