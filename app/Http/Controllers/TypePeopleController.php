<?php

namespace App\Http\Controllers;

use App\Models\TypePeople;
use Illuminate\Http\Request;

class TypePeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listTypePeople = TypePeople::orderBy('id','desc')->simplepaginate(5);
        if(isset($listTypePeople)){
            return view('type_people.index',compact('listTypePeople'));
        }else{
            return view('type_people.index');
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
        TypePeople::create($request->all());
        return redirect('typePeople');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypePeople  $typePeople
     * @return \Illuminate\Http\Response
     */
    public function show(TypePeople $typePeople)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypePeople  $typePeople
     * @return \Illuminate\Http\Response
     */
    public function edit(TypePeople $typePeople)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypePeople  $typePeople
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tp = TypePeople::findOrFail($id);
        $tp->update($request->all());
        return redirect('typePeople');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypePeople  $typePeople
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tp = TypePeople::findOrfail($id);
        $tp->delete();
        return redirect('typePeople');
    }
}
