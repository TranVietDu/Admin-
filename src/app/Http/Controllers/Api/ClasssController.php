<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use App\Models\Classs;
use Illuminate\Http\Request;
use App\Services\ClasssService;
use Illuminate\Support\Facades\Auth;

class ClasssController extends Controller
{
    protected $classsService;
    public function __construct(ClasssService $classsService)
    {
        $this->classsService= $classsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $all=$this->classsService->index();
        $admin=Auth::user();
        return view('admin.class',compact('all'),['user'=>$admin]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $admin=Auth::user();
        return view('admin.addclass',['user'=>$admin]);
    }
    public function store(StoreClassRequest $request)
    {
        $this->classsService->store($request);
        return redirect()->route('classs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function show(Classs $classs)
    {
        return $this->classsService->show($classs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function edit(Classs $classs){
        $admin=Auth::user();
        return view('admin.updateclass',compact('classs'),['user'=>$admin]);
    }
    public function update(UpdateClassRequest $request, Classs $classs)
    {
        $this->classsService->update($request,$classs);
        return redirect()->route('classs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classs $classs)
    {
        $this->classsService->destroy($classs);
        return redirect()->route('classs.index');
    }
    public function countStudentInClass(Classs $classs){
        return $this->classsService->countStudentInClass($classs);
    }
    public function studentInClass(Classs $classs)
    {
        $all=$this->classsService->studentInClass($classs);
        $admin=Auth::user();
        return view('admin.viewstudentClass',compact('all'),['user'=>$admin]);
    }
    public function allStudentAllClass(Classs $classs){
        return $this->classsService->allStudentAllClass($classs);
    }
}
