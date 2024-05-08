@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cursos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('courses.create') }}"> Crear Nuevo Curso</a>
            </div>
        </div>
    </div>

    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre </th>
            <th>Codigo</th>
            <th>Detalles</th>
        </tr>
	    @foreach ($courses as $course)
	    <tr>
	        <td>{{ $course->id}}</td>
	        <td>{{ $course->name }}</td>
	        <td>{{ $course->code }}</td>
            <td>{{ $course->description }}</td>
	    </tr>
	    @endforeach
    </table>




<p class="text-center text-primary"><small>2024</small></p>
@endsection