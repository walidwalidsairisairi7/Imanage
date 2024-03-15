<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher=Teacher::orderBy('created_at','ASC')->get();
        return view('teacher.teacher', compact('teacher'));
    }
    public function create()
    {
        return view('teacher.createTeacher');
    }
    
    public function store(Request $request)
    {
        Teacher::create($request->all());
        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully');
    }
    public function show(string $id)
    {
        $teachers=Teacher::findOrFail($id);
        return view('showTeacher',compact('teachers'));
    }

    public function edit(string $id){
        $teachers=Teacher::findOrFail($id);
        return view('teacher.editTeacher',compact('teachers'));
    }


    public function update(Request $request , string $id){
        $teachers=Teacher::findOrFail($id);
        $teachers->update($request->all( ));
        return redirect()->route('teachers.index')->with('seccess');
    }


    public function  destroy(string $id){
        $teachers= teacher::findOrFail( $id );
        $teachers -> delete();
        return redirect()->route('teachers')->with('success');
    }
}
