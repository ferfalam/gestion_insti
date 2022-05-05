<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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
        $records=DB::table('moyennes')->select('id','name','genre','filiere','n_matricule','moy_annee1','moy_annee2','moy_annee3')->where('filiere','GC')->get()->toArray();
        return $records;
    }
}
