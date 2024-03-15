<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Formation;


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
        
        return view('class.createClass', compact('teachers', 'formations'));
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
            'name' => 'required',
            'teacher_id' => 'required|exists:teachers,id',
            'formation_id' => 'required|exists:formations,id',
        ]);
    
        // Create a new instance of the Classes model
        $class = new Classes();
    
        // Fill the class attributes with the validated data
        $class->fill($request->all());
    
        // Save the class instance to the database
        $class->save();
    
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
