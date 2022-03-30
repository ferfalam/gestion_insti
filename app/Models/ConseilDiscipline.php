<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConseilDiscipline extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_plainte', 'date', 'heure', 'statut'
    ];

    public function Conseilusers(){
        return $this->hasMany(ConseilUsers::class);
    }

    public function Conseilplaintes(){
        return $this->hasMany(Conseilplaintes::class);
    }

    public function rapport(){
        return $this->hasOne(Rapport::class);
    }
}
