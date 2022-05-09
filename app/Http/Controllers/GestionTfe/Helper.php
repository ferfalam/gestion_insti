<?php 

use App\Models\Field;
use App\Models\Tfe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

if(!function_exists("Fields")){
            function Fields(){
            $Filieres=Field::all();
             return $Filieres;     
      }
    }
     if(!function_exists("has_tfe")){
            function has_tfe(){
            $tfe=Tfe::where("user_id",'=',Auth::user()->id)->first();
            
            return $tfe;
       }
     }
?>