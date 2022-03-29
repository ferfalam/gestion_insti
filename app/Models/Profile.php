<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'com_fullname',
        'com_givenName',
        'com_gender', 
        'com_birthdate', 
        'com_birthPlace',
        'com_diploma',
        'com_registrationNumber',
        'com_phoneNumber', 
        'com_address',
        'com_parentFullname', 
        'com_parentGivenName',
        'com_parentPhoneNumber',
        'app_fieldId',
        //'app_pedagogicGroupId', #stockage variable dans le temps
        'app_typeId', //generals
        'ens_principalSpeciality',
        'ens_aditionalSpeciality',
        'ens_RIB',
        'ens_typeId',
        'pers_grade', 
        'pers_typeId',
        'pers_index',
        'pers_ifu',
        'pers_startWorkDate',
        'pers_endWorkDate',
    ];
}
