<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'cin',
        'nom',
        'prenom',
        'dateN',
        'phone',
        'email',
        'class'
    ];
    // Student.php
    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'classes_student');
    }
}
