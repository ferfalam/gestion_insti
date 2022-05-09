<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliberation extends Model
{
    use HasFactory;

    public $fillable = [
        'yearId',
        'semesters',
        'fieldId',
        'groupId',
        'authorId',
        'participants',
        'start',
        'end',
        'report',
        'revealTicket',
        'hideTicket', 
        'uesIds', 
        'infos',
    ];

}
