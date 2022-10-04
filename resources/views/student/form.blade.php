@extends('thema.base')
@section('content')
    <div class="container py-5 text-center">
        @if (isset($student))
            <h1>Editar Estudiantes</h1>
        @else
            <h1>Crear Estudiantes</h1>
        @endif

        @if (isset($student))
            <form action="{{ route('student.update', $student) }}" method="POST">
                @method('PUT')
        @else
            <form action="{{ route('student.store') }}" method="POST">
        @endif
        
            @csrf
            <div class="mb-3">
                <label for="name_student" class="form-label">Estudiante</label>
                <input type="text" name="name_student" class="form-control" placeholder="Nombre Estudiante" value="{{ old('name_student') ?? @$student->name_student }}">
                <p class="form-text">Escribir el nombre del estudiante</p>
                @error('name_student')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Direccion</label>
                <input type="text" name="address" class="form-control" placeholder="Direccion" value="{{ old('address') ?? @$student->address }}">
                <p class="form-text">Escribir la direccion del estudiante</p>
                @error('address')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Numero de telefono</label>
                <input type="number" name="phone_number" class="form-control" placeholder="Numero de telefono" value="{{ old('phone_number') ?? @$student->phone_number }}">
                <p class="form-text">Escribir el numero de telefono del estudiante</p>
                @error('phone_number')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Edad</label>
                <input type="number" name="age" class="form-control" placeholder="Edad del estudiante" value="{{ old('age') ?? @$student->age }}">
                <p class="form-text">Escribir la edad del estudiante</p>
                @error('age')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <label for="subject_id" class="form-label">Asignatura</label>
            <select name="subject_id" id="subject_id" class="form-control">
                @foreach ($subject as $nombre)
                    <option value="{{ $nombre->id }}" {{ old('teacher_id') == $nombre->id ? 'selected' : ''}}>{{ $nombre->name_subject }}</option>
                @endforeach
            </select>


            @if (isset($student))
                <button type="submit" class="btn btn-success">Editar estudiante</button>
            @else
                <button type="submit" class="btn btn-success">Guardar estudiante</button>
            @endif
        </form>
        
    </div>
@endsection