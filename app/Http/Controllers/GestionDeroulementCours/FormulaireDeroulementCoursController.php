<?php

namespace App\Http\Controllers\GestionDeroulementCours;

use App\Models\Field;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\PedagogicGroup;
use App\Models\AcademicSemester;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\FichesDeroulementCours;
use Illuminate\Auth\Events\Registered;

class FormulaireDeroulementCoursController extends Controller
{

    //         $query = Plainte::where('id_plaignant', auth()->user()->id)->get();

    /**
      * Create fiche de remplissage des cours
      * @return \Illuminate\Http\Response
      */
    public function createFormDeroulementCours()
    {
        $idUserRole = Auth::user()->user_groupId;
        if($idUserRole == 3)
        {
        return view( 'gestion_deroulement_cours.fiche.formulaireDeroulementCours');
        }
        else {return view ('gestion_deroulement_cours.accueil');}
    }

    /**
     * For to read all Fiche created.
     * @return \Illuminate\Http\Response
     */
    public function showFormDeroulementCours( Request $request)
    {
        $fichesDeroulementCours = FichesDeroulementCours::all() ;

        return view ('gestion_deroulement_cours.fiche.showFicheDeroulementCours', compact('fichesDeroulementCours'));
    }

    /**
      * Validation and save in database
      * @return \Illuminate\Http\Response
      */
    public function storeFormDeroulementCours(Request $request)
    {
        $idUserRole = Auth::user()->user_groupId;
        if($idUserRole == 3)
        {
        $this->validate( $request , [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'yearstudy' => 'required',
            'filiere' => 'required',
            'ue' => 'required',
            'date' => 'required|min:3',
            'starttime' => 'required',
            'endtime' => 'required',
            'semester' => 'required',
            'nature_ue' => 'required',
            'observation' => 'required|min:3'
        ]);

        $ficheDeroulementCours = FichesDeroulementCours::create(
            [
                'name'=> $request->name,
                'surname'=> $request->surname,
                'studyYearsId'=> $request->yearstudy,
                'fieldsId'=> $request->filiere,
                'ueId'=> $request->ue,
                'dateDeroulement'=> $request->date,
                'startTimeCours'=> $request->starttime,
                'endTimeCours'=> $request->endtime,
                'semestreId'=> $request->semester,
                'nature_ue'=> $request->nature_ue,
                'observation'=> $request->observation
            ]
        );

        event(new Registered($ficheDeroulementCours));
        $this->message = "Nouvelle fiche ajoutee avec succès";
        $this->success = true;

        return view('gestion_deroulement_cours.accueil');
        }
        else {return view ('gestion_deroulement_cours.accueil');}

    }


    public function findById($id)
    {
        $idUserRole = Auth::user()->user_groupId;
        if($idUserRole == 3)
        {

        $flight = FichesDeroulementCours::findorFail($id);

        $studyYears = AcademicYear::all(); 
        $semesters = AcademicSemester::all();
        $filieres = Field::all();
        $ues = PedagogicGroup::all();

        return view('gestion_deroulement_cours.fiche.updateFicheDeroulementCours', compact('flight','studyYears','semesters','filieres','ues'))->with('Success'); 
        }
        else {return view ('gestion_deroulement_cours.accueil');}

    }

    public function updateFormDeroulementCours($id, Request $request)
    {
        $idUserRole = Auth::user()->user_groupId;
        if($idUserRole == 3)
        {
            $flight = FichesDeroulementCours::findorFail($id);
            $flight-> update([
                'name'=> $request->name,
                'surname'=> $request->surname,
                'studyYearsId'=> $request->yearstudy,
                'fieldsId'=> $request->filiere,
                'ueId'=> $request->ue,
                'dateDeroulement'=> $request->date,
                'startTimeCours'=> $request->starttime,
                'endTimeCours'=> $request->endtime,
                'semestreId'=> $request->semester,
                'nature_ue'=> $request->nature_ue,
                'observation'=> $request->observation
            ]);

            return view('gestion_deroulement_cours.accueil')->with('Success');
        }
        else { return view('gestion_deroulement_cours.accueil');}
    
    }

    public function deleteFormDeroulementCours ($id,Request $request) 
    {
        $idUserRole = Auth::user()->user_groupId;
        if($idUserRole == 3)
        {
            $flight = FichesDeroulementCours::findorFail($id);
            $flight->delete();

            return view('gestion_deroulement_cours.accueil');
        }
        else { return view('gestion_deroulement_cours.accueil');  }
    }


    // /**
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function readFicheCourseExecute ( Request $request)
    // {
    //     // Get the information from the database
    //     return view ('gestion_deroulement_cours.fiche.vueFicheDeCoursSortant');
    // }

    // /**
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function readFicheAllCourseTeacher( Request $request)
    // {
    //     // Get the information from the database
    //     return view ('gestion_deroulement_cours.fiche.vueFicheDeCoursEnseignant');
    // }
}

?>
