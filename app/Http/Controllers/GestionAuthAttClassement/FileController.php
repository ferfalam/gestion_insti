<?php

namespace App\Http\Controllers\GestionAuthAttClassement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return Excel::download(new EmployeeExport, 'Employee.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new EmployeeExport, 'Employee.csv');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importIntoCSV()
    {
      return  Excel::import(new MoyImport,'employeelist.csv');

        return back();
    }

    public function ImportForm(){
        return view('pages/ficheDeliberation');
    }

    public function Import(Request $request){

        Excel::import(new EmployeeImport,$request->file);
        return "Record are imported successfully!";
    }

}
