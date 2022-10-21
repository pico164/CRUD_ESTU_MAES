@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
    <div class="container py-5 text-center">
        @if (isset($subject))
            <h1>Editar Asignaturas</h1>
        @else
            <h1>Crear Asignaturas</h1>
        @endif

        @if (isset($subject))
            <form action="{{ route('subject.update', $subject) }}" method="POST">
                @method('PUT')
        @else
            <form action="{{ route('subject.store') }}" method="POST">
        @endif
        
            @csrf
            <div class="mb-3">
                <label for="name_subject" class="form-label">Asignatura</label>
                <input type="text" name="name_subject" class="form-control" placeholder="Nombre Asignatura" value="{{ old('name_subject') ?? @$subject->name_subject }}">
                <p class="form-text">Escribir el nombre de la asignatura</p>
                @error('name_subject')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            

            <label for="teacher_id" class="form-label">Nombre del Maestro</label>
            <select name="teacher_id" id="teacher_id" class="form-control">
                @foreach ($teacher as $nombre)
                    <option value="{{ $nombre->id }}" {{ old('teacher_id') == $nombre->id ? 'selected' : '' }}>{{ $nombre->name_teacher }}</option>
                @endforeach
            </select>


            <div class="mb-3">
                <label for="curse" class="form-label">Curso</label>
                <input type="number" name="curse" class="form-control" placeholder="Numero del curso" value="{{ old('curse') ?? @$subject->curse }}">
                <p class="form-text">Escribir el numero del curso</p>
                @error('curse')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if (isset($subject))
                <button type="submit" class="btn btn-success">Editar Asignaturas</button>
            @else
                <button type="submit" class="btn btn-success">Guardar Asignaturas</button>
            @endif
        </form>
    </div>
        </div>
    </div>
</div>    
@endsection