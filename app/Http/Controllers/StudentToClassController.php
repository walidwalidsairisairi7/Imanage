<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class StudentToClassController extends Controller
{
    
    public function create()
    {
        // Retrieve classes with fewer than 20 students
        $classes = Classes::withCount('students')->having('students_count', '<', 20)->get();
        
        return view('student.createStudent', compact('classes'));
    }
}
