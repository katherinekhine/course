<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('roles', RoleController::class);
Route::resource('courses', CourseController::class);
Route::resource('chapters', ChapterController::class);

Route::get('course/{course}/register', [CourseStudentController::class, 'register'])->name('course.register');
Route::get('course/{course}/unregister', [CourseStudentController::class, 'unregister'])->name('course.unregister');
