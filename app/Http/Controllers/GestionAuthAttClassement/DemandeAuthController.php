<?php

namespace App\Http\Controllers\GestionAuthAttClassement;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class DemandeAuthController extends Controller
{
     /**
     * Display a listing of the resource.
     *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
     $demande=Demande::all();
     return view('gestion_authClass.pages.demande_r',compact('demande'));
    }

    /**
     * Display a listing of the resource.
     *
    * @return \Illuminate\Http\Response
    */
    public function index1()
    {
        
     return view('gestion_authClass.pages.demande');
    }

    
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function create()
    {
     $demande=Demande::all()->where('user_id',Auth::user()->id);
     return view('gestion_authClass.pages.listdemande',compact('demande'));
    }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
        $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
       
         $request->validate([
             'recipient',
             'entite' ,
             'status',
             'piece',
             'objet',
             'message',
         ]);
        
        //  dd($request->last_name);
        // $path= request('piece')->store('avatars');
        // $documentPath = $request->file('piece')->store('public/document');
 
         $details=[
             'name_d'=>$request->name_d,
             'recipient'=>$request->recipient,
             'email'=>$request->email,
             'contact'=>$request->contact,
             'entite'=>$request->entite,
             'status'=>$request->status,
             'objet'=>$request->objet,
             'message'=>$request->message,
 
         ];
 
         
 
         $demande = Demande::create([
             'user_id'=>$profil->user_id,
             'name_d' => $profil->com_fullname,
             'recipient'=>$request->recipient,
             'email' => Auth::user()->email,
             'contact' => $profil->com_phoneNumber,
             'entite' => $request->entite,
             'status' => $request->status,
             'objet' => $request->objet,
             'message' => $request->message,
             'attestation'=>$request->status,
             'status_demande'=>"Non_traiter",
             ]);
 
         $demande->save();
 
        //  Mail::to('dagilles84@gmail.com')->send(new TestMail($details));
 
          return redirect()->route('gestion_authClass.listdemande')->with('success');
 
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $demande=Demande::find($id);
 
         return view('gestion_authClass.pages.demande',compact('demande'));
     }
 
     public function show2($id)
     {
         $demande=Demande::find($id);
         return view('gestion_authClass.pages.demandeaff2',compact('demande'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $demande=Demande::find($id);
         return view('gestion_authClass.pages.updatede',compact('demande'));
 
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
         
         $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
         $demande=Demande::find($id);
         $request->validate([
            'recipient',
            'entite' ,
            'status',
            'piece',
            'objet',
            'message',
        ]);

        
        Demande::find($id)->update([
            'user_id'=>$profil->user_id,
            'name_d' => $profil->com_fullname,
            'recipient'=>$request->recipient,
            'email' => Auth::user()->email,
            'contact' => $profil->com_phoneNumber,
            'entite' => $request->entite,
            'status' => $request->status,
            'objet' => $request->objet,
            'message' => $request->message,
            'attestation'=>$request->status,
            'status_demande'=>"Non_traiter",
            ]);
       
            
 
 
        //  return redirect('gestion_authClass.listdemande')->with('success');
         return redirect()->route('gestion_authClass.listdemande')->with('success');
     }



     public function updateReponse(Request $request, $id)
     {

         $demande=Demande::find($id);
         $profil=DB::table('profiles')->where('user_id',Auth::user()->id)->first();
         $request->validate([
            
            'message',
         ]);

       
 
        Demande::find($id)->update([
            'user_id'=>$demande->user_id,
            'name_d' => $demande->name_d,
            'recipient'=>$demande->recipient,
            'email' => $demande->email,
            'contact' => $demande->contact,
            'entite' => $demande->entite,
            'status' => $demande->status,
            'objet' => $demande->objet,
            'message' => $demande->message,
            'attestation'=>$demande->status,
             'reponse'=>$request->message,
             'name_admin'=>$profil->com_fullname,
             'email_admin'=>Auth::user()->email,
             'contact_admin'=>$profil->com_phoneNumber,
             'status_demande'=>"Traiter",
         ]);

         
 
        //  return redirect('gestion_authClass.listdemande')->with('success');
         return redirect()->route('gestion_authClass.demande_r')->with('success');
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
