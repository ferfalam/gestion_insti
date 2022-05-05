<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use App\Models\Moyenne;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MoyenneExport implements FromCollection,WithHeadings
{
    use HasFactory;

    //  /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     $filiere='GC';
        
    //     return Moyenne::all()->where('filiere', $filiere)->where('genre', 'M');
    // }

    public function headings():array{
        return[
            'N°',
            'Nom et Prénom',
            'Genre',
            'Filière',
            'Matricule',
            'Moyenne Année 1',
            'Moyenne Année 2',
            'Moyenne Année 3',
            'Moyenne Générale',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//        return Employee::all();
        return collect(Employee::getEmployee());
    }
}
