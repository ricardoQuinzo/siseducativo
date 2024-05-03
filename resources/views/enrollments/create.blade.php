<!-- resources/views/enrollments/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Matricular un Estudante</h1>
    <form method="POST" action="{{ route('enrollments.store') }}">
        @csrf
        <div class="mb-3">
            <label for="student_id" class="form-label">Estudiante</label>
            <select class="form-control" id="student_id" name="student_id" required>
                @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->student_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Curso</label>
            <select class="form-control" id="course_id" name="course_id" required>
                @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enroll</button>
    </form>
</div>
@endsection
