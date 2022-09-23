<?php

namespace App\Http\Controllers;

use App\Models\TypeUser;
use Illuminate\Http\Request;

class TypeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tus = TypeUser::orderBy('id','desc')->paginate(5);
        if(isset($tus)){
            return view('type_user.index',compact('tus'));
        }else{
            return view('type_user.index');
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
        TypeUser::create($request->all());
        return redirect('typeUser');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeUser  $typeUser
     * @return \Illuminate\Http\Response
     */
    public function show(TypeUser $typeUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeUser  $typeUser
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeUser $typeUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeUser  $typeUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tu = TypeUser::findOrFail($id);
        $tu->update($request->all());
        return redirect('typeUser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeUser  $typeUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tu = TypeUser::findOrFail($id);
        $tu->delete();
        return redirect('typeUser');
    }
}
