<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;



Route::get('/', function () {
    return view('welcome');
})->middleware(['auth:sanctum', 'verified'])->name('welcome');




Route::get('/students', [StudentController::class, 'show'])->name('students.show');
Route::get('/payments', [PaymentController::class, 'show'])->name('payments.show');

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'registerUser']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'loginUser']);

Route::post('/logout', [UserController::class, 'logoutUser'])->middleware(['auth:sanctum'])->name('logout');




