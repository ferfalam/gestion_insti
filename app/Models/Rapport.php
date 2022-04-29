<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $fillable = [
        'id_conseil', 'path'
    ];

    public function conseil(){
        return $this-> belongsTo(ConseilDiscipline::class, 'id_conseil');
    }
}
