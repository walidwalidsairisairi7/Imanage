<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Formation;

class FormationController extends Controller
{
    public function index()
    {
        $formation=Formation::orderBy('created_at','ASC')->get();
        return view('formation.formation', compact('formation'));
    }
    public function create()
    {
        return view('formation.createFormation');
    }
    
    public function store(Request $request)
    {
        Formation::create($request->all());
        return redirect()->route('formations.index')->with('success', 'Formation created successfully');
    }
     public function edit(string $id)
    {

    }
     public function update(Request $request ,string $id)
    {

    }
}
