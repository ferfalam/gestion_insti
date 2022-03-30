<?php

namespace App\Http\Controllers\GestionTfe;

use App\Http\Controllers\Controller;
use App\Models\Tfe;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $years = Tfe::years();
        $kw = $request->input('search'); 
        $tfes = [];

       if($kw!=null){
        if (is_numeric($kw)) {
            $tfes = Tfe::searchByYear($kw)->get();
        }
        elseif(str_starts_with($kw, '@_')){
            $kw = trim($kw, '@_');
            $tfes = Tfe::searchByEntity($kw)->get();
        }
        else{
            $tfes = Tfe::searchByTheme($kw)->get();
        }
        return view('GestionTfe.search', compact('tfes', 'years', 'kw'));
       }
       else{
           return Redirect()->back();
       }
    }
}
