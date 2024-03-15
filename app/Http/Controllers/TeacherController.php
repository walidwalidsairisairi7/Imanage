<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('created_at','DESC')->get();
        return view('teacher',compact( 'teachers'));
    }


    public function create()
    {
        return view('createTeacher');
    }



    public function store(Request $request)
    {
        Teacher::create($request->all());
        return redirect()->route('teachers.index' )->with('seccess');
    }


    public function show(string $id)
    {
        $teachers=Teacher::findOrFail($id);
        return view('showTeacher',compact('teachers'));
    }

    public function edit(string $id){
        $teachers=Teacher::findOrFail($id);
        return view('editTeacher',compact('teachers'));
    }


    public function update(Request $request , string $id){
        $teachers=Teacher::findOrFail($id);
        $teachers->update($request->all( ));
        return redirect()->route('teachers.index')->with('seccess');
    }


    public function  destroy(string $id){
        $teachers= teacher::findOrFail( $id );
        $teachers -> delete();
        return redirect()->route('teachers')->with('seccess');
    }
}
