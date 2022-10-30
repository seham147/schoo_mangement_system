<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Repository\student\StudentRepositoryInterface;

class StudentController extends Controller
{
    public $student;
    public function __construct(StudentRepositoryInterface $student )
    {
         $this->student=$student;
    }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->student->get_students();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->student->CreateStudents();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->student->store_students($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return $this->student->get_students($id);

    // }

    public function show($id)

    {
        return $this->student->show_students($id);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->student->edit_students($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request)
    {
        return $this->student->update_students($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->student->Delete_Student($request);

    }

    public function Get_classrooms ($id)
    {
        return $this->student-> Get_classrooms($id);
    }

    public function Get_sections ($id)
    {
        return $this->student-> Get_sections($id);
    }


    public function Upload_attachment(Request $request){
        return $this->student->Upload_attachment($request);

    }
    public function  Delete_attachment(Request $request){
//  return $request;
        return $this->student-> Delete_attachment($request);

    }
public function Download_attachment($student_name,$file_name){
    return $this->student-> Download_attachment($student_name,$file_name);

}
   
}
