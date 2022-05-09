<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Rapport;
use App\Models\ConseilDiscipline;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Storage;

class RapportController extends Controller
{
    //
    public function new(){
        return view('form');
    }

    public function view($id){
        $tile = Rapport::find($id);
        return view('gestion_conseils_plaintes.rapports', compact('tile'));
    }

    public function show(){
        $query = Rapport::all();
        return view('gestion_conseils_plaintes.rapports_user', compact('query'));
    }

    public function form($id){
        return view('gestion_conseils_plaintes.rapport_form', compact('id'));
    }

    public function downloadRapport(Request $request, $id)
    {
    $file =  public_path('rapports').'/'.Rapport::find($id)->path;

    //dd(public_path('rapports').'/'. Rapport::find($id)->path);
    $headers = ['Content-Type: application/pdf'];

    //Storage::download($file, Rapport::find($id)->path, $headers);
        return Storage::download($file);
    }

    public function create(Request $req, $id){
        $req->validate([
            'file' => 'required',
            'file.*' => 'required|mimes:docx,pdf|max:2048',
        ]);

         $name = $req->file('file')->getClientOriginalName();

         $path = Storage::putFileAs('rapports', $req->file('file'), $name);
        //$path = $req->file('file')->move('rapports', $name);

        $store = Rapport::create([
                'id_conseil' => $id,
                'path' => $name
            ]);
        ConseilDiscipline::find($id)->update([
                'rapport' => 1
            ]);

        return redirect()->route('gestion_conseils_plaintes.liste_rapports');
    }

    public function destroy(Request $request, $id){
        $Del = Rapport::find($id);
        if (file_exists(public_path('rapports').'/'.$Del->path)) {
            ConseilDiscipline::find($Del->id_conseil)->update([
                'rapport' => 0
            ]);
            $Del->delete();
            return unlink(public_path('rapports').'/'.$Del->path);
        } else {
            echo('File not found.');
        }

        $request->session()->flash('alert-success', ' The rapport is deleted successfully.');
        return redirect()->route('gestion_conseils_plaintes.liste_rapports');
     }
}
