<!-- resources/views/grades/report.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Grade Reports</h1>
    @foreach ($reports as $course_id => $grades)
        <div class="card mb-3">
            <div class="card-header">
                Course ID: {{ $course_id }}
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($grades as $grade)
                    <li class="list-group-item">{{ $grade->student->name }} - Score: {{ $grade->score }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection
