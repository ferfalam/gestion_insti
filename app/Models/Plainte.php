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

    public function plainteUser(){
        return $this->hasMany(PlainteUser::class);
    }

    public function plainteconseils(){
        return $this->hasMany(ConseilPlainte::class);
    }
}
