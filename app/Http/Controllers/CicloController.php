<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ciclos = Ciclo::orderBy('id','desc')->simplePaginate(5);
        if(isset($ciclos)){
            return view('ciclo.index',compact('ciclos'));
        }else{
            return view('ciclo.index');
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
        Ciclo::create($request->all());
        return redirect('ciclo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function show(Ciclo $ciclo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciclo $ciclo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ciclo = Ciclo::findOrFail($id);
        $ciclo->update($request->all());
        return redirect('ciclo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ciclo = Ciclo::findOrFail($id);
        $ciclo->delete();
        return redirect('ciclo');
    }
}
