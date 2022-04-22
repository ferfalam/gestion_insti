<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\GestionAuthAttClassement\Employee;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionAuthAttClassement\Moyenne;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

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
