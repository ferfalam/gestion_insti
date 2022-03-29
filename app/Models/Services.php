<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    //direction,departement, scolarite, secretariat, comptabilite, maintenance, cooperation

    protected $fillable = [
        'name',
        'description',
    ];
}
