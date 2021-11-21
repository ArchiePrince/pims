<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\BatcheController;
use App\Http\Controllers\AttendanceController;

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


Route::view('dashboard', 'dashboard');


Route::get('nametags', function () {
    return view('/nametags');
    
});

Route::delete('/selected-participants',[ParticipantController::class, 'deleteCheckedParticipants'])->name('participant.deleteSelected');

Route::resource('batches', BatcheController::class);

Route::resource('participants', ParticipantController::class)->middleware('auth');


Route::resource('attendance', AttendanceController::class)->middleware('auth');



Route::resource('events', EventController::class)->middleware('auth');



Route::resource('users', UserController::class)->middleware('auth');
