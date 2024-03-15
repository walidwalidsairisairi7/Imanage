<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ClassController;



Route::get('/', function () {
    return view('welcome');
})->middleware(['auth:sanctum', 'verified'])->name('welcome');

Route::get('/test', function () {
    return view('test');
});

Route::controller(StudentController::class)->prefix('students')->group(function () {
    Route::get('/',  'index')->name('students.index');
    Route::get('/update',  'update')->name('students.update');
});


// authentification


Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'registerUser']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'loginUser']);
Route::post('/logout', [UserController::class, 'logoutUser'])->middleware(['auth:sanctum'])->name('logout');


//student


Route::get('/createStudent', [StudentController::class, 'create'])->name('students.create');
Route::post('/studentstore', [StudentController::class, 'store'])->name('students.store');
Route::get('/editStudent/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/editStudent/{id}', [StudentController::class, 'edit'])->name('students.update');


//teacher


Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/createTeacher', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teacherstore', [TeacherController::class, 'store'])->name('teachers.store');


//payment


Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/createPayment', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/paymentstore', [PaymentController::class, 'store'])->name('payments.store');


//formation


Route::get('/formations', [FormationController::class, 'index'])->name('formations.index');
Route::post('/formationstore', [FormationController::class, 'store'])->name('formations.store');
Route::get('/createFormation', [FormationController::class, 'create'])->name('formations.create');


//class


Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
Route::get('/createClass', [ClassController::class, 'create'])->name('classes.create');
Route::post('/classesstore', [ClassController::class, 'store'])->name('classes.store');
