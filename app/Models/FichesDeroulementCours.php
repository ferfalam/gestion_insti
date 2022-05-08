<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FichesDeroulementCours extends Model
{

    use HasFactory;

    // semestre_annee, semestre_cycle, annee_etude, type_enseignant/apprenant/personnel/UE/composition/stage/, nature_UE

    protected $fillable = [
        'name',
        'surname',
        'studyYearsId',
        'fieldsId',
        'ueId',
        'dateDeroulement',
        'startTimeCours',
        'endTimeCours',
        'semestreId',
        'nature_ue',
        'observation',
    ];

    public function studyYears(){
        return $this->belongsTo(AcademicYear::class, 'studyYearsId');
    }
    
    public function fields(){
        return $this->belongsTo(Field::class, 'fieldsId');
    }

    public function ue(){
        return $this->belongsTo(Ue::class, 'ueId');
    }

    public function semestre(){
        return $this->belongsTo(AcademicSemester::class, 'semestreId');
    }



    //  /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'id_plaignant', 'motif', 'description', 'statut'
    // ];

    // public function fautifs(){
    //     return $this->hasMany(PlainteUser::class, 'id_plainte');
    // }

    // public function temoins(){
    //     return $this->hasMany(PlainteTemoin::class, 'id_plainte');
    // }

    // public function conseil(){
    //     return $this->hasOne(ConseilDiscipline::class, 'id_plainte');
    // }

}