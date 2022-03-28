<?php

namespace App\Http\Controllers\GestionDeroulementCours;

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
      *
      * @return \Illuminate\Http\Response
      */
    public function createFiche()
    {
        // $annee_detude = DB::select('select appelation from academic_years');
        // $filieres = DB::select('select appelation from fields');
        // $ues = DB::select('select appelation from u_e_s');
        // $acad_semestre = DB::select('select designation from academic_semesters');
        //$groupe_pedagogique = DB::select('select designation from educational_groups') ;

        $annee_detude = AcademicYear::all() ;
        $filieres = Field::all() ;
        // $ues = U_E_S::all() ;
        $acad_semestre = AcademicSemester::all() ;
        $groupe_pedagogique = PedagogicGroup::all();

        return view( 'gestion_deroulement_cours.fiche.formulaireDeroulementCours', compact('ues','groupe_pedagogique','acad_semestre','annee_detude','filieres'));
    }

    /**
      *
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

        /* NameOfModel::create(
            [
                'attributes' => $request->nameInForm,
                'title' => $request-> title
            ]
        );*/
        
        // return redirect('/accueil');
        return view('gestion_deroulement_cours.fiche.ficheDeCoursSortant');
    }

    /**
     * Show a list of all of the application information's FicheDeroulementCours .
     *
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
    public function readFicheDefinitive( Request $request)
    {
        // Get the information from the database
        return view ('gestion_deroulement_cours.accueil');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    
}

?>