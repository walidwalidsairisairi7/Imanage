<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/register', [UserController::class,'createUser']);
// Route::post('/register', [UserController::class,'createUser']);
Route::get('/login', [UserController::class,'loginUser']);
Route::post('/login', [UserController::class,'loginUser']);



