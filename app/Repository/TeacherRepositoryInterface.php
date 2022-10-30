<?php

namespace App\Repository;

interface TeacherRepositoryinterface 
{
    public function getAllTeachers();
    public function getSpecialization();
    public function getGender();
    public function StoreTeachers($request);
    public function editTeachers($id);
    public function updateTeachers($request);
    public function deleteTeachers($request);

}