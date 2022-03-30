<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortcutsRequest extends Model
{
    protected $fillable = [
        'academic_year_Id',
        'pedagogic_group_Id',
        'academic_semester_Id',
        'field_Id',
        'ue_Id',
    ];
}
