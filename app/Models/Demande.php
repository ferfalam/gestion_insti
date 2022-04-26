<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable=[
        "name_d",
        "genre_d",
        "email",
        "contact",
        "entite",
        "status",
        "objet",
        "message",
        "attestation",
    ];
}
