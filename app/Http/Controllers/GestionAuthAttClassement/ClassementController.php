<?php

namespace App\Http\Controllers\GestionAuthAttClassement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
 
         $moyenne=DB::select('SELECT * FROM Moyenne Order by moy_generale DESC');
         return view('gestion_authClass.pages.classement', ['moyenne' => $moyenne]);
 
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
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         //
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
}
