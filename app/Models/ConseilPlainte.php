<?php

namespace App\Models;

use App\Models\Plainte;
use App\Models\ConseilDiscipline;
use Illuminate\Database\Eloquent\Model;

class ConseilPlainte extends Model
{
    public function conseil(){
        return $this->belongsTo(ConseilDiscipline::class);
    }

    public function plaintes(){
        return $this->belongsTo(Plainte::class);
    }
}
