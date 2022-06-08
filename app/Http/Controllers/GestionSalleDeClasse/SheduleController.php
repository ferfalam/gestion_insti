<?php

namespace App\Http\Controllers\GestionSalleDeClasse;

use App\Http\Controllers\Controller;
use App\Models\AcademicSemester;
use App\Models\AcademicYear;
use App\Models\Field;
use App\Models\PedagogicGroup;
use App\Models\Ue;
use App\Models\User;
use Illuminate\Http\Request;

class SheduleController extends ScheduleBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->fields = Field::orderBy('systemName')->get();
        $this->semesters = AcademicSemester::orderBy('designation')->get();
        $this->years = AcademicYear::orderBy('startDate', 'DESC')->get();
        $this->groups = PedagogicGroup::orderBy('name')->get();
        return view('gestion_salles.shedule.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->fields = Field::orderBy('systemName')->get();
        $this->ues = Ue::orderBy('name')->get();
        $this->semesters = AcademicSemester::orderBy('designation')->get();
        $this->years = AcademicYear::orderBy('startDate', 'DESC')->get();
        $this->users = User::join('profiles', 'profiles.user_id', 'users.id')->join('user_groups', 'user_groups.id', 'users.user_groupId')->where('user_groups.name', 'enseignant')->orderBy('profiles.com_fullname')->get();
        // dd($this->users);
        return view('gestion_salles.shedule.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
