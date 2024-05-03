<!-- resources/views/grades/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Curso</h1>
    <form method="POST" action="{{ route('grades.update', $grade->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="student_id" class="form-label">Estudiante ID</label>
            <input type="number" class="form-control" id="student_id" name="student_id" value="{{ $grade->student_id }}" required>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Curso ID</label>
            <input type="number" class="form-control" id="course_id" name="course_id" value="{{ $grade->course_id }}" required>
        </div>
        <div class="mb-3">
            <label for="score" class="form-label">Puntaje</label>
            <input type="text" class="form-control" id="score" name="score" value="{{ $grade->score }}" required>
        </div>
        <div class="mb-3">
            <label for="exam_type" class="form-label">Examen Tipo</label>
            <input type="text" class="form-control" id="exam_type" name="exam_type" value="{{ $grade->exam_type }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
