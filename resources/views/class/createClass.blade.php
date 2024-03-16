@extends('layouts.default')
<link rel="stylesheet" href="css/add.css">

@section('content')
    <div class="w-full max-w-[300px] bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Add a Class</h2>
        <form action="{{ route('classes.store') }}" method="POST" class="flex flex-col">
            @csrf
            <input type="text" name="nom" placeholder="Nom" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150">

            <select name="teacher_id" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150">
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->nom }} {{ $teacher->prenom }}</option>
                @endforeach
            </select>

            <select name="formation_id" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150">
                <option value="">Select Formation</option>
                @foreach($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                @endforeach
            </select>

            <select name="student_id[]" class="bg-gray-100 text-gray-800 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" multiple size="5">
                <option value="">Select Student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->nom }}</option>
                @endforeach
            </select>

            <button type="submit" class="button">Add Class</button>
        </form>
    </div>
@endsection
