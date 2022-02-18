<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\BatcheController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('auth.login');
});

Route::get('dashboard', function () {
    return view('/dashboard');
})->middleware('auth');


//Route::view('dashboard', 'dashboard');


Route::get('nametags', function () {
    return view('/nametags');
})->middleware('auth');

Route::resource('batches', BatcheController::class)->middleware('auth');

Route::resource('departments', DepartmentController::class)->middleware('auth');

Route::resource('participants', ParticipantController::class)->middleware('auth');
Route::post('participants', [ParticipantController::class, 'import'])->name('participants.import')->middleware('auth');

Route::resource('attendance', AttendanceController::class)->middleware('auth');



Route::resource('events', EventController::class)->middleware('auth');



Route::resource('users', UserController::class)->middleware('auth');
