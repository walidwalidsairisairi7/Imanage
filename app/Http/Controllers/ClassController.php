<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Formation;
use App\Models\Student;


class ClassController extends Controller
{
    /**
     * Display a listing of the classes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::all();
        return view('class.class', compact('classes'));
    }

    /**
     * Show the form for creating a new class.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $formations = Formation::all();
        $students = Student::all(); // Assuming you want all students

        return view('class.createClass', compact('teachers', 'formations', 'students'));
    }

    /**
     * Store a newly created class in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'teacher_id' => 'required|exists:teachers,id',
            'formation_id' => 'required|exists:formations,id',
            'student_id' => 'required|exists:students,id',
            // You may need to adjust the validation rule for student_id[] as per your requirement
        ]);

        $class = new Classes();
        $class->nom = $request->input('nom');
        $class->teacher_id = $request->input('teacher_id');
        $class->formation_id = $request->input('formation_id');
        $class->save();

        // Assuming you have a many-to-many relationship between Class and Student
        $class->students()->attach($request->input('student_id'));

        return redirect()->route('classes.index')->with('success', 'Class created successfully');
    }

    /**
     * Display the specified class.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Classes::findOrFail($id);
        return view('classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified class.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        return view('classes.edit', compact('class'));
    }

    /**
     * Update the specified class in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add validation rules for other class attributes
        ]);

        $class = Classes::findOrFail($id);
        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Class updated successfully');
    }

    /**
     * Remove the specified class from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully');
    }
}
