<?php

namespace App\Models\GestionAuthAttClassement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
            'name'     => $row['name'],
            'genre'     => $row['genre'],
            'n_matricule'    => $row['matricule'],
            'filiere'    => $row['filiere'],
            'moy_annee1'    => $row['moy1'],
            'moy_annee2'    => $row['moy2'],
            'moy_annee3'    => $row['moy3'],

        ]);
    }
}
