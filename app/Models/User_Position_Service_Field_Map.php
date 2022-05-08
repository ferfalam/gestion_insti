<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Position_Service_Field_Map extends Model
{
    protected $fillable = [
        'userId',
        'serviceId',
        'positionId',
        'fieldId',
    ];
    public $timestamps = false;
}
