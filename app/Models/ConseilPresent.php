<?php

namespace App\Models;
use App\Models\User;
use App\Models\ConseilDiscipline;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConseilPresent extends Model
{
    protected $fillable = [
        'id_conseil', 'id_present'
    ];

    public function present(){
        return $this->belongsTo(User::class, 'id_present');
    }

    public function conseils(){
        return $this->belongsTo(ConseilDiscipline::class);
    }
}
