<?php

namespace App\Http\Controllers\GestionTfe;

use App\Http\Controllers\Controller;
use App\Http\Requests\GestionTfe\TfeRequest;
use App\Models\Document;
use App\Models\Tfe;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TfeController extends Controller
{
    //

    public function index(){
        $years = Tfe::years();
        $tfes = Tfe::orderByDate()->get();
        return view('GestionTfe.welcome', compact('tfes', 'years'));
    }
    
    
    public function create(Guard $auth){

        $years = Tfe::years();
        if ($auth->check()) {
            return view('GestionTfe.tfe.create', compact('years'));
        }
    }


    public function store(TfeRequest $request){


       if(!has_tfe()){
        $name = Document::getName($request);
        
        // store the file into directory
        $path = $request->file('document')->storeAs('public/tfe_documents',$name);

        // store in file infos into the database
        Document::create([
            'name' => $name,
            'path' => $path,
        ]);

        $id = Arr::last(Document::select('id')->get()->toArray())['id'];
    
        // store the tfe into DB
        $data = $request->all();
        $data["user_id"]=Auth::user()->id;
        $data = Arr::add($data, 'document_id', $id);
        $tfe=Tfe::create($data);
       
       
        return redirect(route('gestion_tfe.tfe.profil',compact('id')));
       }
       else{
        return redirect()->back()->with('error', 'Vous avez déjà un tfe');
       }
    }
    
    public function update(TfeRequest $request, $id){
        
        

        $tfe = Tfe::findOrFail($id);
        $document=Document::where("document_id",'=',$tfe->document_id)->get()->first();
        $name = Document::name($request);
        $path = $request->file('document')->storeAs('public/tfe_documents',$name);
        $document->update(['name' => $name, 'path' => $path]);
        $tfe->update($request->all());
        return redirect()->back()->withMessage('Tfe bien modifié !');
    }


    public function show($id, Guard $auth){

        if ($auth->check()) {
            $document_id = Arr::first(Tfe::where('document_id', $id)->select('document_id')->get()->toArray())['document_id'];
           
            $path = Arr::first(Document::where('id', $document_id)->select('path')->get()->toArray())['path'];
            
            $path = Storage::path($path);

            header('Content-type: application/pdf');
            readfile($path);
        }
        return view('GestionTfe.tfe.unauthorize');
    
    }


    public function edit($id){
        $years = Tfe::years();       
        $tfe = Tfe::findOrFail($id);
        $document=Document::findOrFail($tfe->document_id);
        return view('GestionTfe.tfe.edit', compact('years', 'tfe','document'));
    }


    


    public static function destroy($id,$call=false){
    

        // on prend l'id du document
        $document_id = Arr::first(Tfe::where('id', $id)->select('document_id')->get()->toArray())['document_id'];
    
        // suppression du fichier
        $path = Arr::first(Document::where('id', $document_id)->select('path')->get()->toArray())['path'];
        $path = Storage::path($path);
        
        unlink($path);

        // suppression du document de la base de donnée
        $document = Document::findOrFail($document_id);
        $document->delete();

        // suppression de tfe
        $tfe = Tfe::findOrFail($id);
        $tfe->delete();

        //si la fonction n'a pas été appelée par une autre 
        if($call==false){
             return redirect(route('gestion_tfe.welcome'))->with('success', 'Le tfe a été bien supprimé.');
        }
       

    }
}
