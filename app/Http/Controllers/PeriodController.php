<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Number;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $periods = Period::orderBy('id','desc')->simplePaginate(10);
        $numbers = Number::all();
        if(isset($periods)){
            return view('period.index',compact('periods','numbers'));
        }else{
            return view('period.index');
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
        Period::create($request->all());
        return redirect('period');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $period = Period::findOrFail($id);
        return redirect('period');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $period = Period::findOrFail($id);
        $period->delete();
        return redirect('period');
    }
}
