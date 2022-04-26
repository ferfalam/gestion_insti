<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocation extends Model
{
    protected $fillable = [
        'id_conseil'
    ];

    public function conseil(){
        return $this-> belongsTo(ConseilDiscipline::class);
    }
}
