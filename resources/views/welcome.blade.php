@extends('thema.base')
@section('content')
    <div class="container py-5 text-center">
        <h1>Aplicativo Cursos</h1>
        <a href="{{ route('student.index') }}" class="btn btn-primary">Estudiantes</a>
        <a href="{{ route('teacher.index') }}" class="btn btn-primary">Maestros</a>
        <a href="{{ route('subject.index') }}" class="btn btn-primary">Materias</a>
    </div>
@endsection