<?php

namespace App\Models;

use App\Models\Moyenne;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoyenneExport implements FromCollection,WithHeadings
{
    use HasFactory;

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
        // return collect(Employee::getEmployee());
        return Moyenne::all()->where('genre', 'M');
        // return Moyenne::all()->where('filiere', $request->filiere)->where('genre', $request->annee);
    }
}
