<!-- resources/views/courses/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear un nuevo curso</h1>
    <form method="POST" action="{{ route('courses.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Curso</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Codigo de Curso</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripcion</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Curso</button>
    </form>
</div>
@endsection
