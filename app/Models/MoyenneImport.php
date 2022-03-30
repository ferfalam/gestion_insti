<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\GestionAuthAttClassement\Moyenne;
use App\Models\GestionAuthAttClassement\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Eloquent\Model;

class MoyenneImport implements ToModel, WithHeadingRow
{
    use HasFactory;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Moyenne([
            'name'=> $row['name'],
            'genre'=> $row['genre'],
            'filiere'=> $row['filiere'],
            'n_matricule'=> $row['n_matricule'],
            'moy_annee1'=> $row['moy_annee1'],
            'moy_annee2'=> $row['moy_annee2'],
            'moy_annee3'=> $row['moy_annee3'],

        ]);
    }
}
