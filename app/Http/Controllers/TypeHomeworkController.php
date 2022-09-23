<?php

namespace App\Http\Controllers;

use App\Models\TypeHomework;
use Illuminate\Http\Request;

class TypeHomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ths = TypeHomework::orderBy('id','desc')->simplepaginate('5');
        if(isset($ths)){
            return view('type_homework.index',compact('ths'));
        }else{
            return view('type_homework.index');
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
        TypeHomework::create($request->all());
        return redirect('typeHomework');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeHomework  $typeHomework
     * @return \Illuminate\Http\Response
     */
    public function show(TypeHomework $typeHomework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeHomework  $typeHomework
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeHomework $typeHomework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeHomework  $typeHomework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $th = TypeHomework::findOrFail($id);
        $th->update($request->all());
        return redirect('typeHomework');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeHomework  $typeHomework
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $th = TypeHomework::findOrFail($id);
        $th->delete();
        return redirect('typeHomework');
    }
}
