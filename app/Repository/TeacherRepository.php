<?php

namespace App\Repository;

use Exception;
use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;

// use App\Repository\TeacherRepositoryinterface;

class TeacherRepository implements TeacherRepositoryinterface
{
    public function getAllTeachers(){
        return Teacher::all();

    }
    public function getSpecialization(){
        return Specialization::all();

    }
    public function getGender(){
        return Gender::all();

    }
    public function StoreTeachers($request){

        // try {
                $Teachers = new Teacher();
                $Teachers->email = $request->Email;
                $Teachers->password =  Hash::make($request->Password);
                $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
                $Teachers->Specialization_id = $request->Specialization_id;
                $Teachers->Gender_id = $request->Gender_id;
                $Teachers->Joining_Date = $request->Joining_Date;
                $Teachers->Address = $request->Address;
                $Teachers->save();
                // toastr()->success(trans('messages.success'));
                return redirect()->route('Teachers.create');
            // }
            // catch (Exception $e) {
            //     return redirect()->back()->with(['error' => $e->getMessage()]);
            // }
    
        }

        public function editTeachers($id){
            return Teacher::findorfail($id);
        }



        public function updateTeachers($request){

            // return $request;
//  try {
    $Teachers =Teacher::findorfail($request->id);
    $Teachers->email = $request->Email;
    $Teachers->password =  Hash::make($request->Password);
    $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
    $Teachers->Specialization_id = $request->Specialization_id;
    $Teachers->Gender_id = $request->Gender_id;
    $Teachers->Joining_Date = $request->Joining_Date;
    $Teachers->Address = $request->Address;
    $Teachers->save();
    // toastr()->success(trans('messages.success'));
    return redirect()->route('Teachers.create');
//}
// catch (Exception $e) {
    // return redirect()->back()->with(['error' => $e->getMessage()]);
// }

        }

        
        public function deleteTeachers($request){
            Teacher::findorfail($request->id)->delete();


        }
}