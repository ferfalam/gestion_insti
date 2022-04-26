<?php

namespace App\Http\Controllers\GestionConseilsPlaintes;

use Illuminate\Http\Request;
use App\Models\DynamicField;
use Validator;

class DynamicFieldController extends Controller
{
    function index()
    {
     return view('dynamic_field');
    }

    function insert(Request $request)
    {
     if($request->ajax())
     {
      $rules = array(
       'participant_name.*'  => 'required',
       'participant_id.*'  => 'required'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json([
        'error'  => $error->errors()->all()
       ]);
      }

      $participant_name = $request->participant_name;
      //$participant_id = $request->participant_id;
      for($count = 0; $count < count($participant_name); $count++)
      {
       $data = array(
        'participant_name' => $participant_name[$count],
        'participant_id'  => User::where('name', request('participant_name'))->get()[0]->id
       );
       $insert_data[] = $data;
      }

      DynamicField::insert($insert_data);
      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
     }
    }

}



