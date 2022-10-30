<?php

namespace App\Repository\student;

interface StudentRepositoryInterface
{ 


    public function get_students();
    public function CreateStudents();
    public function  Get_classrooms($id);
    public function Get_sections($id);
    public function store_students($request);
    public function update_students($request);
    public function edit_students($id);
    public function show_students($id);
    public function Delete_attachment($request);
    public function Delete_Student($request);
    public function Upload_attachment($request);
    public function Download_attachment($student_name,$file_name);
    
    

}
