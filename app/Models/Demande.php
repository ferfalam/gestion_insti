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
        "user_id",
        "name_d",
        "recipient",
        "email",
        "contact",
        "entite",
        "status",
        "objet",
        "message",
        "attestation",
        "status_demande",
        "name_admin",
        "email_admin",
        "contact_admin",
        "reponse"
    ];
}
