<?php

namespace App\Models\GestionAuthAttClassement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = "moyennes";

    protected $fillable=['name','genre','filiere','n_matricule','moy_annee1','moy_annee2','moy_annee3'];


    public static function getEmployee()
    {
        $records=DB::table('moyennes')->select('id','name','genre','filiere','n_matricule','moy_annee1','moy_annee2','moy_annee3')->get()->toArray();
        return $records;
    }
}
