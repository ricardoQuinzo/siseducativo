<!-- resources/views/enrollments/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Enrollments</h1>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Enroll Student</a>
    <ul>
        @foreach ($enrollments as $enrollment)
        <li>{{ $enrollment->student->student_name }} enrolled in {{ $enrollment->course->name }}
            <form action="{{ route('enrollments.destroy', $enrollment) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Cancel Enrollment</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>
@endsection
