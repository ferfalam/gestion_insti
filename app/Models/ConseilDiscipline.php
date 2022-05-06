<?php

namespace App\Models;
use App\Models\ConseilDiscipline;
use App\Models\ConseilUsers;
use App\Models\ConseilPlainte;
use App\Models\ConseilPresent;
use App\Models\Rapport;
use App\Models\Plainte;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class ConseilDiscipline extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_plainte', 'date', 'heure', 'lieu', 'convocationsOK','invitationsOK', 'tenue', 'maitre'
    ];

    public function participants(){
        return $this->hasMany(ConseilUsers::class, 'id_conseil');
    }

    public function presents(){
        return $this->hasMany(ConseilPresent::class, 'id_conseil');
    }

    public function Conseilplaintes(){
        return $this->hasMany(ConseilPlainte::class);
    }

    public function conseilpresents(){
        return $this->hasMany(ConseilPresent::class, 'id_conseil');
    }

    public function rapport(){
        return $this->hasOne(Rapport::class, 'id_conseil');
    }

    public function maitres(){
        return $this->belongsTo(User::class, 'maitre');
    }

    public function convocations(){
        return $this->hasMany(Convocations::class);
    }
    public function plainte(){
        return $this->belongsTo(Plainte::class, 'id_plainte');
    }
}
