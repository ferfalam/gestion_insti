<?php

namespace App\Models;

use App\Models\User;
use App\Models\ConseilDiscipline;
use Illuminate\Database\Eloquent\Model;

class ConseilUsers extends Model
{
    protected $fillable = [
        'id_conseil', 'id_user'
    ];

    public function participant(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function conseils(){
        return $this->belongsTo(ConseilDiscipline::class);
    }
}
