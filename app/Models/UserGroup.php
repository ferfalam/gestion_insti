<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userGroup extends Model
{
    use HasFactory;

    //admin,superadmin,apprenant,enseignant,personnel,redacteur,partenaire

    protected $fillable = [
        'name',
        'description',
    ];
}
