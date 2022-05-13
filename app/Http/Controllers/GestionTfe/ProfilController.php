<?php

namespace App\Http\Controllers\GestionTfe;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Profile;
use App\Models\Tfe;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    function index($id){
      $status='';
      $tfe=null;
      if($id!=-1){
         $tfe=Tfe::find($id);
      }
      if($tfe!=null){
            if($tfe->status==1){
            $status='Validé';
          } elseif($tfe->status==2){
             $status='Rejetté';
          } 
          else{
             $status='En attente';
          }
       }
        
        return view('GestionTfe.tfe.show',['tfe'=>$tfe,'status'=>$status]);
    }
}
