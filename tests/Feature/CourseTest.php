<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Student;

it('displays each course with its enrolled students', function () {
    $courses = Course::factory()->count(3)->create();

    $courses->each(function ($course) {
        $students = Student::factory()->count(rand(1, 5))->create();

        $course->students()->attach($students);
    });

    $response = $this->get('/courses');

    $response->assertStatus(200);

    $courses->each(function ($course) use ($response) {
        $response->assertSee($course->name);
        foreach ($course->students as $student) {
            $response->assertSee($student->name);
        }
    });
});

