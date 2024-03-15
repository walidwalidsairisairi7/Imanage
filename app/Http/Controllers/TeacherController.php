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
     public function edit(string $id)
    {

    }
     public function update(Request $request ,string $id)
    {

    }
}
