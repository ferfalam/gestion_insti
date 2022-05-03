<?php

namespace App\Models;

use App\Models\User;
use App\Models\Plainte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlainteUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_plainte', 'id_user'
    ];

    public function fautif(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function plainte(){
        return $this->belongsTo(Plainte::class);
    }
}
