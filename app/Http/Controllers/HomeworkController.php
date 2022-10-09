<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Models\TypeHomework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $homeworks = Homework::orderBy('id','desc')->simplePaginate(20);
        $typeHomeworks = TypeHomework::all();
        if(isset($homeworks)){
            return view('homework.index',compact('homeworks','typeHomeworks'));
        }else{
            return view('homework.index');
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
        Homework::create($request->all());
        return redirect('homework');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function show(Homework $homework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $homework = Homework::findOrFail($id);
        $homework->update($request->all());
        return redirect('homework');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Homework  $homework
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $homework = Homework::findOrFail($id);
        $homework->is_active = 0;
        $homework->update();
        return redirect('homework');
    }
}
