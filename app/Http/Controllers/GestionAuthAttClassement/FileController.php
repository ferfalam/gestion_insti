<?php

namespace App\Http\Controllers\GestionAuthAttClassement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Imports\EmployeeImport;
use App\Models\GestionAuthAttClassement\MoyenneImport; 
use Maatwebsite\Excel\Facades\Excel;
use App\Models\GestionAuthAttClassement\MoyenneExport;

class FileController extends Controller
{
     /**
    * @return \Illuminate\Support\Collection
    */
    public function addEmployee()
    {
       $Employees = [];

       Employee::insert($Employees);
       return "Recordes are inserted";
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportIntoExcel()
    {
        return Excel::download(new MoyenneExport, 'Employee.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new MoyenneExport, 'Employee.csv');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importIntoCSV()
    {
      return  Excel::import(new MoyenneImport,'employeelist.csv');

        return back();
    }

    public function ImportForm(){
        return view('gestion_authClass.pages/ficheDeliberation');
    }

    public function Import(Request $request){

        Excel::import(new MoyenneImport,$request->file);
        // return "Record are imported successfully!";
        return redirect()->back();
    }

}