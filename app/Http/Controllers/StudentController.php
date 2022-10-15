<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Matter;
use App\Models\Homework;
use App\Models\TypeHomework;
use App\Models\LevelSection;
use App\Models\StudentHomework;
use App\Models\StudentLevel;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::orderBy('id','desc')->paginate(3);
        $homeworks = Homework::all();
        $level_sections = LevelSection::all();
        $student_homeworks = StudentHomework::all();
        $total_puntos = 0;
        $student_levels = StudentLevel::all();
        $matters = Matter::all();
        if(isset($students)){
            return view('student.index',compact('students','homeworks','level_sections','student_homeworks','student_levels','total_puntos','matters'));
        }else{
            return view('student.index');
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

    public function print_nota($id){
        $now = Carbon::now();
        $now = $now->locale('es');
        $homework = StudentHomework::where('student_id',$id)->get();
        $student_level = StudentLevel::where('student_id',$id)->get();
        $level = $student_level->first();
        $matters = Matter::all();
        $student = Student::findOrFail($id);
        $type_homeworks = TypeHomework::all();
        $pdf = PDF::loadView('pdf.notas',compact('homework','student_level','student','type_homeworks','level','matters','now'));
        $pdf->setPaper('a4','portrait');
        return $pdf->download('Notas -'.$student->fullname.'.pdf');

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
        Student::create($request->all());
        return redirect('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('student');
    }
}
