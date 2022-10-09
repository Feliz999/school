<?php

namespace App\Http\Controllers;

use App\Models\LevelSection;
use Illuminate\Http\Request;

class LevelSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lss = LevelSection::orderBy('id','desc')->simplePaginate(10);
        if(isset($lss)){
            return view('level_section.index',compact('lss'));
        }else{
            return view('level_section.index');
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
        LevelSection::create($request->all());
        return redirect('level_section');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LevelSection  $levelSection
     * @return \Illuminate\Http\Response
     */
    public function show(LevelSection $levelSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LevelSection  $levelSection
     * @return \Illuminate\Http\Response
     */
    public function edit(LevelSection $levelSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LevelSection  $levelSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ls = LevelSection::findOrFail($id);
        return redirect('level_section');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LevelSection  $levelSection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ls = LevelSection::findOrFail($id);
        $ls->delete();
        return redirect('level_section');
    }
}
