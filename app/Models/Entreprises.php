<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Entreprises extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designation',
        'email',
        'adresse',
        'capacite',
        'domaines',
        'partenariat',
        'partenariat_date',
        'd_contact',
        's_contact',
        'a_contact',
        'user_id',
        'logoname',
        'startdate',
        'enddate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

}
