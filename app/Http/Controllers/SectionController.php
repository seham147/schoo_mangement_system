<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flasher\Prime\FlasherInterface;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades=Grade::with(['Sections'])->get();
        $list_Grades=Grade::all();
        $Sections=section::all();
        $teachers=Teacher::all();
        return view('pages.sections.sections',compact('Grades','list_Grades','Sections','teachers'));
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
        // return $request;
        try{
            $Sections=new section();
            $Sections->Name_Section=['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            $Sections->Status = 1;
            $Sections->save();
            $Sections->teachers()->attach($request->teacher_id);


            $flasher->addSuccess('Data has been saved successfully!');
            return redirect()->route('sections.index');
    
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,FlasherInterface $flasher )
    {
        // return 'ggggg';
    try {
        // $validated = $request->validated();
        $Sections = Section::findOrFail($request->id);
//   return $Sections;
        $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
        $Sections->Grade_id = $request->Grade_id;
        $Sections->Class_id = $request->Class_id;
  
        if(isset($request->Status)) {
          $Sections->Status = 1;
        } else {
          $Sections->Status = 2;
        }
  
  
         // update pivot tABLE
          if (isset($request->teacher_id)) {
              $Sections->teachers()->sync($request->teacher_id);
          } else {
              $Sections->teachers()->sync(array());
          }
  
  
        $Sections->save();
        $flasher->addSuccess('Data has been saved successfully!');

  
        return redirect()->route('Sections.index');
    }
    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,FlasherInterface $flasher)
    {
        Section::findOrFail($request->id)->delete();
        $flasher->addSuccess('Data has been saved successfully!');

    return redirect()->route('sections.index');
    }


    public function getclasses($id)
    
    {
    


        $list_classes = Classroom::where("grade_id", $id)->pluck("Name_Class", "id");
        return json_encode($list_classes);

        // return $list_classes;
       
    }


   
}
