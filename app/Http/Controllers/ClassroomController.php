<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;


class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $Grades=Grade::all();
        $Class_rooms=Classroom::all();
        
        return view('pages.Classrooms.classrooms',compact('Grades','Class_rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,FlasherInterface $flasher)
    {
        $classroom=new Classroom();
        $classroom->Name_Class=[
            'ar' => $request->Name,
            'en' => $request->Name_class_en
        ];
        $classroom->grade_id=$request->Grade_id;
        $classroom->save();


        $flasher->addSuccess('Data has been saved successfully!');
        return redirect()->route('Classrooms.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,FlasherInterface $flasher)
    {
        // return $request;

        $class=Classroom::findorfail($request->id);
        // return $class;
        $class->Name_Class=[
            'ar' => $request->Name,
            'en' => $request->Name_class_en
        ];
        $class->grade_id=$request->Grade_id;
        $class->save();


        $flasher->addSuccess('Data has been updated successfully!');
        return redirect()->route('Classrooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,FlasherInterface $flasher)
    {

        Classroom::findorfail($request->id)->delete();

        $flasher->addSuccess('Data has been deleted successfully!');
        return redirect()->route('Classrooms.index');

    }


    public function delete_all(Request $request,FlasherInterface $flasher){
        // return $request;
        $ids=explode(',',$request->delete_all_id);
        Classroom::wherein('id',$ids)->delete();


        $flasher->addSuccess('Data has been deleted successfully!');
        return redirect()->route('Classrooms.index');

    }
}
