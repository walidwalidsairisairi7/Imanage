<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom'
    ];

    public function students()
{
    return $this->belongsToMany(Student::class);
}
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
    public function create()
{
    // Retrieve classes with fewer than 20 students
    $classes = Classes::withCount('students')->having('students_count', '<', 20)->get();
    
    return view('student.createStudent', compact('classes'));
}
}
