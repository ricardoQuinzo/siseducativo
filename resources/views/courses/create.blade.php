<!-- resources/views/courses/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a New Course</h1>
    <form method="POST" action="{{ route('courses.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Course Code</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Course</button>
    </form>
</div>
@endsection
