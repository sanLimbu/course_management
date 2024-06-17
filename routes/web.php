<?php

use Illuminate\Support\Facades\Route;

use App\Models\Course;

Route::get('/courses', function () {
    $courses = Course::with('students')->get();
    return view('courses.index', compact('courses'));
});
