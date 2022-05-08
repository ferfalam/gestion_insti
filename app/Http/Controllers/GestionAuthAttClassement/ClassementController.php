<?php

namespace App\Http\Controllers\GestionAuthAttClassement;

use App\Models\Field;
use App\Models\Moyenne;
use PDF;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;

class ClassementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
 
    }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
 
 
    public function create()
    {

        $annee_detude = AcademicYear::all() ;
        $filieres = Field::all() ;
        //  $moyenne=DB::select('SELECT * FROM Moyennes Order by moy_generale DESC')->where('filiere','GC');
         $moyenne=Moyenne::all();
         return view('gestion_authClass.pages.classement', compact('moyenne','annee_detude','filieres'));
 
    }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
 
         $request->validate([
             'name',
             'genre',
             'matricule',
             'filiere' ,
             'moy1',
             'moy2' ,
             'moy3',
             'value',
         ]);
 
 
         $moyenne = Moyenne::create([
             'name' => $request->name,
             'genre'=>$request->genre,
             'n_matricule' => $request->matricule,
             'filiere' => $request->entite,
             'moy1' => $request->status,
             'moy2' => $request->objet,
             'moy3' => $request->message,
             'moy_generale'=>$request->moy_generale,
             ]);
 
         $moyenne->save();
 
          return redirect('exmoy')->with('success');
 
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function show(Request $request)
     {
        $annee_detude = AcademicYear::all() ;
        $filieres = Field::all() ;
       
        
        $request->validate([
            'filiere',
            // 'annee',
        ]);

        
        if ($request->filiere=='all') {
            $moyenne=Moyenne::all();
        } else {
            $moyenne=Moyenne::all()->where('filiere',$request->filiere);
        }
        
        

        //  $moyenne=Moyenne::all()->where('filiere',$request->filiere)->where('moy_generale',$request->annee);
         
         return view('gestion_authClass.pages.classement', compact('moyenne','annee_detude','filieres'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         //
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         //
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         //
     }


     public function getClassementPdf(Request $request){

        $request->validate([
            'filiere',
            // 'annee',
        ]);

        if ($request->filiere=='all') {
            $moyenne=Moyenne::all();
        } else {
            $moyenne=Moyenne::all()->where('filiere',$request->filiere);
        }

        // $moyenne = Moyenne::all()->where('filiere', $request-)->where('genre', 'M');
        
        $pdf = PDF::loadView('gestion_authClass.pages.classementPdf',compact('moyenne','request'));
        return $pdf->download('Classements.pdf');
       
    }
}
