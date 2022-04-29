<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicSemester extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'calendar', //fichier
        'startDate',
        'endDate',
        'observation',
    ];
}
