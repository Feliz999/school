<?php

namespace App\Http\Controllers;

use App\Models\StudentHomework;
use App\Models\Homework;
use App\Models\LevelSection;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentHomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $homeworks = Homework::all();
        $level_sections = LevelSection::all();
        $student_homeworks = StudentHomework::orderBy('id','desc')->simplePaginate(10);
        $sh = StudentHomework::all();
        $total_puntos = $sh->sum('points');
        $students = Student::all();
        if(isset($student_homeworks)){
            return view('student_homework.index',compact('student_homeworks','homeworks','level_sections','total_puntos','students'));
        }else{
            return view('student_homework.index');
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
        StudentHomework::create($request->all());
        return redirect('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentHomework  $studentHomework
     * @return \Illuminate\Http\Response
     */
    public function show(StudentHomework $studentHomework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentHomework  $studentHomework
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
     * @param  \App\Models\StudentHomework  $studentHomework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sh = StudentHomework::findOrFail($id);
        $sh->update($request->all());
        return redirect('student_homework');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentHomework  $studentHomework
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sh = StudentHomework::findOrFail($id);
        $sh->delete();
        return redirect('student_homework');
    }
}
