<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryinterface;
class TeacherController extends Controller
{

    public $teacher;
    
    public function __construct(TeacherRepositoryinterface $myteacher)
    {
        $this->teacher = $myteacher;

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Teachers= $this->teacher->getAllTeachers();
        return view('pages.Teachers.Teachers',compact('Teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations=$this->teacher->getSpecialization();
        $genders=$this->teacher->getGender();
        return view('pages.Teachers.create',compact('specializations','genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         return $this->teacher->StoreTeachers($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Teachers= $this->teacher->editTeachers($id);
        $specializations=$this->teacher->getSpecialization();
        $genders=$this->teacher->getGender();
        return view('pages.Teachers.Edit',compact('Teachers','specializations','genders'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return $request;
        return $this->teacher->updateTeachers($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->teacher->deleteTeachers($request);

    }
}
