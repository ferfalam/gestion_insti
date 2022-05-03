<?php

namespace App\Models;
use App\Models\ConseilDiscipline;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlainteUser;
use App\Models\PlainteTemoin;

class Plainte extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_plaignant', 'motif', 'description', 'statut'
    ];

    public function fautifs(){
        return $this->hasMany(PlainteUser::class, 'id_plainte');
    }

    public function temoins(){
        return $this->hasMany(PlainteTemoin::class, 'id_plainte');
    }

    public function conseil(){
        return $this->hasOne(ConseilDiscipline::class, 'id_plainte');
    }

    public function plaignant(){
        return $this->belongsTo(User::class, 'id_plaignant');
    }
}
