<!-- resources/views/grades/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Grades List</h1>
    <a href="{{ route('grades.create') }}" class="btn btn-primary">Add New Grade</a>
    <ul class="list-group mt-3">
        @foreach ($grades as $grade)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Student ID: {{ $grade->student_id }} - Course ID: {{ $grade->course_id }} - Score: {{ $grade->score }}
                <div>
                    <a href="{{ route('grades.edit', $grade) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('grades.destroy', $grade) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
