<!-- resources/views/grades/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listo de Notas</h1>
    <a href="{{ route('grades.create') }}" class="btn btn-primary">Añadir nuevo grado</a>
    <ul class="list-group mt-3">
        @foreach ($grades as $grade)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Estudiante: {{ $grade->student->student_name }} - Curso: {{ $grade->course->name }} - Curso Código: {{ $grade->course->code }} - Puntaje: {{ $grade->score }}
                <div>
                    <a href="{{ route('grades.edit', $grade) }}" class="btn btn-sm btn-secondary">Editar</a>
                    <form action="{{ route('grades.destroy', $grade) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach

    </ul>
</div>
@endsection
