<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_pedagogic_group_map extends Model
{
    protected $fillable = [
        'user_Id',
        'pedagogic_group_Id',
    ];
}
