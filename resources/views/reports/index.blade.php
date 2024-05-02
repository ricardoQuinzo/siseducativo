<!-- resources/views/reports/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis calificaciones y resultado del examens</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Course</th>
                <th>Exam Type</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentGrades as $grade)
            <tr>
                <td>{{ $grade->course->name }}</td>
                <td>{{ $grade->exam_type }}</td>
                <td>{{ $grade->score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
