<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedagogicGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fieldId',
        'academicYearId',
        'studyYearId',
    ];
}
