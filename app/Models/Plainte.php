<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plainte extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_plaignant', 'motif', 'description', 'statut'
    ];

    public function plainteUsers(){
        return $this->hasMany(PlainteUser::class, 'id_user');
    }

    public function plainteconseils(){
        return $this->hasMany(ConseilPlainte::class);
    }

    public function plaignant(){
        return $this->belongsTo(User::class, 'id_plaignant');
    }
}
