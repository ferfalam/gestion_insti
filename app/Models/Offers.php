<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'entreprise_id',
        'domaine',
        'niv_etude',
        'gratification',
        'localisation',
        'start_date',
        'end_date',
        'profils',
        'mission',
    ];
}
