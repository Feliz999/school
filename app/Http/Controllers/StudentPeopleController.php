<?php

namespace App\Http\Controllers;

use App\Models\StudentPeople;
use Illuminate\Http\Request;

class StudentPeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $student_peoples = StudentPeople::orderBy('id','desc')->simplePaginate(10);
        if(isset($student_peoples)){
            return view('student_people.index',compact('student_peoples'));
        }else{
            return view('student_people.index');
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
        StudentPeople::create($request->all());
        return redirect('student_people');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentPeople  $studentPeople
     * @return \Illuminate\Http\Response
     */
    public function show(StudentPeople $studentPeople)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentPeople  $studentPeople
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentPeople $studentPeople)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentPeople  $studentPeople
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $sp = StudentPeople::findOrFail($id);
        $sp->update($request->all());
        return redirect('student_people');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentPeople  $studentPeople
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sp = StudentPeople::findOrFail($id);
        $sp->delete();
        return redirect('student_people');
    }
}
