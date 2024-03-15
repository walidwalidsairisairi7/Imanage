<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $student=Student::orderBy('created_at','ASC')->get();
        return view('student', compact('student'));
    }
    public function create()
    {
        return view('student.createStudent');
    }
    
    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }
     public function edit(string $id)
    {
        $student=Student::findOrFail($id);
        return view('studentEdit',compact('student'));
    }
     public function update(Request $request ,string $id)
    {
        $student=Student::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success','Student updated successfully');
    }
}
