<?php

namespace App\Models\GestionAuthAttClassement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoyenneExport implements Fromcollection
{
    use HasFactory;

     /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Moyenne::all();
    }
}
