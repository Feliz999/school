<?php

namespace App\Http\Controllers;

use App\Models\StudentLevel;
use App\Models\Student;
use App\Models\LevelSection;
use Illuminate\Http\Request;

class StudentLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        $level_sections = LevelSection::where('is_active',1)->where('is_finished',0)->get();
        $students_level = StudentLevel::orderBy('id','desc')->simplePaginate(25);
        if(isset($students_level)){
            return view('student_level.index',compact('students_level','students','level_sections'));
        }else{
            return view('student_level.index');
        }
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
    public function store(Request $request)
    {
        //
        StudentLevel::create($request->all());
        return redirect('student_level');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentLevel  $studentLevel
     * @return \Illuminate\Http\Response
     */
    public function show(StudentLevel $studentLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentLevel  $studentLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentLevel $studentLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentLevel  $studentLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentLevel $studentLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentLevel  $studentLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentLevel $studentLevel)
    {
        //
    }
}
