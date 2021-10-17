<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentService
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Students::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = $request->validate([
            'name' => 'required|max:100|min:5',
            'age' => 'required:max:100'
        ]);
        $student = new Students;
        $student->name = $request->name;
        $student->age = $request->age;
        $student->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student)
    {
        return Students::find($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $student)
    {
        $request->validate([
            'name' => 'required|max:100|min:4',
            'age' => 'required:max:100'
        ]);
        $student->name = $request->name;
        $student->age = $request->age;
        $student->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student)
    {
        $student->delete();
    }
}
