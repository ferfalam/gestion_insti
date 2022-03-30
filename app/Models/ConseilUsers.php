<?php

namespace App;

use App\User;
use App\Models\ConseilDiscipline;
use Illuminate\Database\Eloquent\Model;

class ConseilUsers extends Model
{
    public function participants(){
        return $this->belongsTo(User::class);
    }

    public function conseils(){
        return $this->belongsTo(ConseilDiscipline::class);
    }
}
