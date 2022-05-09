<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ConseilDiscipline;

class Rapport extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_conseil', 'path'
    ];

    public function conseil(){
        return $this-> belongsTo(ConseilDiscipline::class, 'id_conseil');
    }
}
