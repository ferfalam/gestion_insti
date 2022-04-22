<?php

namespace App\Models;

use App\User;
use App\Plainte;
use Illuminate\Database\Eloquent\Model;

class PlainteUser extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function plaintes(){
        return $this->belongsTo(Plainte::class);
    }
}
