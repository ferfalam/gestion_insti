<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conseil extends Model
{
    use HasFactory;
    protected $fillable=[
        "theme",
        "user_id",
        "objet",
        "description",
        "date_tenu",
        "signataire",
        "note_service",
        "liste_participants"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
