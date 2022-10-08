@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    <div class="container py-5 text-center">
        @if (isset($details))
            <h1>Editar Matricula</h1>
        @else
            <h1>Crear Matricula</h1>
        @endif

        @if (isset($details))
            <form action="{{ route('detail.update'), $details }}" method="POST">
                @method('PUT')
        @else
            <form action="{{ route('detail.store') }}" method="POST">
        @endif
        
            @csrf
            <div class="mb-3">
                <label for="subject_id" class="form-label">Nombre de la Asignatura</label>
                <select name="subject_id" id="subject_id" class="form-control">
                    @foreach ($detail as $nombre)
                        <option value="{{ $nombre->id }}" {{ old('subject_id') == $nombre->id ? 'selected' : ''}}>{{ $nombre->name_subject }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="student_id" class="form-label">Nombre de los estudiantes</label>
                <select name="student_id" id="student_id" class="form-control">
                    @foreach ($name as $student)
                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : ''}}>{{ $student->name_student }}</option>
                    @endforeach
                </select>
            </div>


            @if (isset($details))
                <button type="submit" class="btn btn-success">Editar Matricula</button>
            @else
                <button type="submit" class="btn btn-success">Matricular</button>
            @endif
        </form>
        
    </div>
        </div>
    </div>
</div>
@endsection