@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Nueva Admision</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('applications.index') }}"> Regresar</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

    <div class="container mt-5">
        
        <form action="{{ route('applications.store') }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="student_name" class="form-label">Nombre del Estudiante:</label>
                <input type="text" class="form-control" id="student_name" name="student_name" required>
            </div>
            <div class="mb-3">
                <label for="student_email" class="form-label">Email del Estudiante:</label>
                <input type="email" class="form-control" id="student_email" name="student_email" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Direccion:</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="previous_school" class="form-label">Escuela Anterior:</label>
                <input type="text" class="form-control" id="previous_school" name="previous_school" required>
            </div>
            <div class="mb-3">
                <label for="gpa" class="form-label">Nota:</label>
                <input type="number" step="0.01" class="form-control" id="gpa" name="gpa" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Admision</button>
        </form>
    </div>

    <p class="text-center text-primary"><small>2024</small></p>
@endsection
