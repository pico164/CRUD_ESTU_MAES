<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

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


Route::resource('student', StudentController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('subject', SubjectController::class);

Auth::routes();
Route::view('/','welcome')->name('welcome');
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('admin/home',[HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

