@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h1>Admisiones</h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('applications.create') }}"> Crear Nueva Admision</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


   
    <ul>
        @foreach ($applications as $application)
            <li>{{ $application->student_name }} - {{ $application->accepted ? 'Accepted' : 'Rejected' }}</li>
        @endforeach
    </ul>


    <p class="text-center text-primary"><small>2024</small></p>
@endsection