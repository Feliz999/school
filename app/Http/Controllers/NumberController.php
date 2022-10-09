<?php

namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $numbers = Number::orderBy('id','desc')->simplePaginate(10);
        if(isset($numbers)){
            return view('number.index',compact('numbers'));
        }else{
            return view('number.index');
        }
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
        Number::create($request->all());
        return redirect('number');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $number = Number::findOrFail($id);
        $number->update($request->all());
        return redirect('number');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $number = Number::findOrFail($id);
        $number->delete();
        return redirect('number');

    }
}
