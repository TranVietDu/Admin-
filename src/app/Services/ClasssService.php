<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Classs;

class ClasssService
{
    public function index()
    {
        return Classs::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classs=$request->validate([
            'nameclass'=>'required|max:100'
        ]);
        $classs=new Classs();
        $classs->nameclass=$request->nameclass;
        $classs->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function show(Classs $classs)
    {
       return Classs::find($classs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classs $classs)
    {
        $request->validate([
            'nameclass'=>'required'
        ]);
        $classs->nameclass=$request->nameclass;
        $classs->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classs $classs)
    {
        $classs->delete();
    }
    public function countStudentInClass(Classs $classs){
        return $classs->student->count();
    }
    public function studentInClass(Classs $classs)
    {
        return $classs->student;
    }
    public function allStudentAllClass(Classs $classs){
        $result=$classs->all();
        foreach($result as $rs){
            $hi[]=$rs->nameclass;
            $hi[]=$rs->student;
        }
        return $hi;
    }
}
