<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlainteTemoin extends Model
{
    protected $fillable = [
        'id_plainte', 'id_temoin'
    ];

    public function temoin(){
        return $this->belongsTo(User::class, 'id_temoin');
    }

    public function plainte(){
        return $this->belongsTo(Plainte::class);
    }
}
