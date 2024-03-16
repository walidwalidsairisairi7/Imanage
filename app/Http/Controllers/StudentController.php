<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Student;
use App\Models\Classes;

class StudentController extends Controller
{
    public function index()
    {
        $student=Student::orderBy('created_at','ASC')->get();
        return view('student.student', compact('student'));
    }
    public function create()
    {  
        $class = Classes::with('students')->get();
    
        // return view('student.createStudent', compact('classes'));
        return view('student.createStudent', compact('class'));
    }
    
    public function store(Request $request)
    {
        // Validate student data
    
        $student = Student::create($request->all());
    
        // Associate student with class if a class is selected
        if ($request->filled('class_id')) {
            $class = Classes::findOrFail($request->class_id);
            $class->students()->attach($student->id);
        }
        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

     public function edit(string $id)
    {
        $student=Student::findOrFail($id);
        return view('student.studentEdit',compact('student'));
    }
     public function update(Request $request ,string $id)
    {
        $student=Student::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success','Student updated successfully');
    }
}
