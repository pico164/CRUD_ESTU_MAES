@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container py-5 text-center">
                        <h1>Aplicativo Cursos</h1>
                        <a href="{{ route('student.index') }}" class="btn btn-primary">Estudiantes</a>
                        <a href="{{ route('teacher.index') }}" class="btn btn-primary">Maestros</a>
                        <a href="{{ route('subject.index') }}" class="btn btn-primary">Materias</a>
                        <a href="{{ route('detail.index') }}" class="btn btn-primary">Matriculas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
