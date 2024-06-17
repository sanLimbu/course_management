<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
</head>
<body>
    <h1>Courses and Students</h1>
    @foreach ($courses as $course)
        <h2>{{ $course->name }} ({{ $course->start_date }} - {{ $course->end_date }})</h2>
        <ul>
            @foreach ($course->students as $student)
                <li>{{ $student->name }} ({{ $student->email }})</li>
            @endforeach
        </ul>
    @endforeach
</body>
</html>
