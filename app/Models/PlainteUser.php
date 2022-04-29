<?php

namespace App\Models;

use App\Models\User;
use App\Models\Plainte;
use Illuminate\Database\Eloquent\Model;

class PlainteUser extends Model
{
    protected $fillable = [
        'id_plainte', 'id_user'
    ];

    public function user(){
        return $this->belongsTo(User::class, );
    }

    public function plaintes(){
        return $this->belongsTo(Plainte::class);
    }
}
