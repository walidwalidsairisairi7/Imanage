<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;


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

Route::get('/createStudent', [StudentController::class, 'create'])->name('students.create');
Route::post('/studentstore', [StudentController::class, 'store'])->name('students.store');
Route::post('/paymentstore', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/editStudent/{id}', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/editStudent/{id}', [StudentController::class, 'edit'])->name('students.update');
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'registerUser']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'loginUser']);
Route::post('/logout', [UserController::class, 'logoutUser'])->middleware(['auth:sanctum'])->name('logout');

Route::get('/createPayment', [PaymentController::class, 'create'])->name('payments.create');