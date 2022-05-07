<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class GenralityController extends Controller
{
    public function index()
    {
        $filieres = Field::all() ;

        return view('genarality.index',  compact('filieres'));
    }
}
