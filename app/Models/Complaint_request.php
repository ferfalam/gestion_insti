<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint_request extends Model
{
    protected $fillable =[
        'first_name',
        'last_name',
        'userId',
        'motif',
        'description_motif',
        'evaluation_type',
        'ue',
        'document_path',
        'field',
        'pegagogic_group',
        'academic_year_start',
        'academic_year_end',
        'academic_semester',
        'created_date',
    ];
}

