<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Student;

class CourseStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        Course::all()->each(function ($course) use ($students) {
            $course->students()->attach(
                $students->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
