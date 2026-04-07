<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;



Route::get('/', function () {
    return view('welcome');
});


Route::resource('courses', CourseController::class);
Route::resource('enrollments', EnrollmentController::class);
Route::get('/', [DashboardController::class, 'index']);
Route::resource('lessons', LessonController::class);
