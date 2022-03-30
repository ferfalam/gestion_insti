<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation_type extends Model
{

    protected $fillable = [
        'designation',
        'description',
    ];
}
