<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_PedagogicGroup_Map extends Model
{
    protected $fillable = [
        'user_Id',
        'pedagogic_group_Id',
    ];
    public $timestamps = false;
}
