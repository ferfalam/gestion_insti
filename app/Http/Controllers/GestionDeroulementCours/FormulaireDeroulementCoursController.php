<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use App\Models\Ue;
use App\Models\Field;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\PedagogicGroup;
use App\Models\AcademicSemester;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FormulaireDeroulementCoursController extends Controller
{

    /**
      * Create fiche de remplissage des cours
      * @return \Illuminate\Http\Response
      */
    public function readItemsModule()
    {
        $annee_detude = AcademicYear::all() ;
        $filieres = Field::all() ;
        $ues = Ue::all() ;
        $acad_semestre = AcademicSemester::all() ;
        $groupe_pedagogique = PedagogicGroup::all();

        return view( 'gestion_deroulement_cours.fiche.formulaireDeroulementCours', compact('ues','groupe_pedagogique','acad_semestre','annee_detude','filieres'));
    }

    /**
      * Validation and save in database
      * @return \Illuminate\Http\Response
      */
    public function store(Request $request)
    {
        $this->validate( $request , [
            'surname' => 'required|min:3',
            'name' => 'required|min:3',
            'yearstudy' => 'required',
            'ue' => 'required',
            'date' => 'required|min:3',
            'starttime' => 'required',
            'endtime' => 'required',
            'semester' => 'required',
            'observation' => 'required|min:3'
        ]);

        // save in a model Group pedagogique
        // so create a model group pedagogique

        /* NameOfModel::create(
            [
                'attributes' => $request->nameInForm,
                'title' => $request-> title
            ]
        );*/

        return view('gestion_deroulement_cours.fiche.ficheDeCoursSortant');
    }

    /**
     * .
     * Remodify the tuple
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        return view( 'gestion_deroulement_cours.fiche.formulaireDeroulementCours');
    }


    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function readFicheCourseExecute ( Request $request)
    {
        // Get the information from the database
        return view ('gestion_deroulement_cours.fiche.ficheDeCoursSortant');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function readFicheAllCourseTeacher( Request $request)
    {
        // Get the information from the database
        return view ('gestion_deroulement_cours.fiche.ficheDeCoursEnseignant');
    }
}

?>
