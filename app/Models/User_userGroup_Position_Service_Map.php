<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_userGroup_Position_Service_Map extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'userGroupId',
        'serviceId',
        'positionId,'
    ];
}
