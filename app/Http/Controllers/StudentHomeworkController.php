<?php

namespace App\Http\Controllers;

use App\Models\StudentHomework;
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
        $student_homeworks = StudentHomework::orderBy('id','desc')->simplePaginate(10);
        if(isset($student_homeworks)){
            return view('student_homework.index',compact('student_homeworks'));
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
        return redirect('student_homework');
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
