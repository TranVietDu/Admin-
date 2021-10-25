<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Services\StudentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=$this->studentService->index();
        $admin=Auth::user();
        return view('admin.student',compact('all'),['user'=>$admin]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $admin=Auth::user();
        return view('admin.addstudent',['user'=>$admin]);
    }
    public function store(StoreStudentRequest $request)
    {
        $this->studentService->store($request);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student)
    {
        return $this->studentService->show($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student){
        $admin=Auth::user();
        return view('admin.updatestudent',compact('student'),['user'=>$admin]);
    }
    public function update(UpdateStudentRequest $request, Students $student)
    {
        $this->studentService->update($request,$student);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student)
    {
        $this->studentService->destroy($student);
        return redirect()->route('students.index')->with('thongbao','Successful Delete');
    }
    public function deleteAll(Request $request)
    {
        $this->studentService->deleteAll($request);
        return response()->json(['success'=>"Student Deleted successfully."]);
    }
}
