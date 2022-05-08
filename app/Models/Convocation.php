<?php

namespace App\Models;
use App\Models\ConseilDiscipline;
use App\Models\Convocation;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Convocation extends Model
{
    protected $fillable = [
        'id_conseil','id_user','type'
    ];

    public function conseil(){
        return $this-> belongsTo(ConseilDiscipline::class, 'id_conseil');
    }

    public function user(){
        return $this-> belongsTo(User::class, 'id_user');
    }
}
