<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrade;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use PhpParser\Node\Stmt\TryCatch;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $Grades=Grade::all();
        return view('pages.Grades.Grades',compact('Grades'));
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
    public function store(StoreGrade $request ,FlasherInterface $flasher)
    {
        // if(Grade::where('Name->ar',$request->Name)->orwhere('Name->en',$request->Name)->exists()){
        //     $flasher->addSuccess('this feild existssssss!');
        //     return redirect()->route('grades.index');
        // }




        $grade= new Grade();
        $grade->Name=[
            'ar' => $request->Name,
            'en' => $request->Name_en
        ];
        $grade->Notes= $request->Notes;
        $grade->save();

        $flasher->addSuccess('Data has been saved successfully!');
        return redirect()->route('grades.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,FlasherInterface $flasher)
     { 

        
        try{ $grade=Grade::findorfail($id);
       
            $grade->Name=[
                'ar' => $request->Name,
                'en' => $request->Name_en
            ];
            $grade->Notes= $request->Notes;
            $grade->save();
    
    
            $flasher->addSuccess('Data has been updated successfully!');
            return redirect()->route('grades.index');
    }
    catch  (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       

    }
}








    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id,FlasherInterface $flasher)
    {
        $my_class_id=Classroom::where('grade_id',$request->id)->pluck('grade_id');
        if($my_class_id->count()==0){

            $grade=Grade::findOrfail($id);
            $grade->delete();

            $flasher->addSuccess('Data has been delete successfully!');
            return redirect()->route('grades.index');
        }
       
        else{ $flasher->addSuccess('cantttttttttttttttttt!');
            return redirect()->route('grades.index');}

       
    }
}
