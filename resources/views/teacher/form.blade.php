@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container py-5 text-center">
                @if (isset($teacher))
                    <h1>Editar Maestros</h1>
                @else
                    <h1>Crear Maestros</h1>
                @endif
        
                @if (isset($teacher))
                    <form action="{{ route('teacher.update', $teacher) }}" method="POST">
                        @method('PUT')
                @else
                    <form action="{{ route('teacher.store') }}" method="POST">
                @endif
                
                    @csrf
                    <div class="mb-3">
                        <label for="name_teacher" class="form-label">Maestros</label>
                        <input type="text" name="name_teacher" class="form-control" placeholder="Nombre Maestro" value="{{ old('name_teacher') ?? @$teacher->name_teacher }}">
                        <p class="form-text">Escribir el nombre del maestro</p>
                        @error('name_teacher')
                            <p class="form-text text-danger">{{ $message }}</p>
                        @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="address" class="form-label">Direccion</label>
                        <input type="text" name="address" class="form-control" placeholder="Direccion" value="{{ old('address') ?? @$teacher->address }}">
                        <p class="form-text">Escribir la direccion del maestro</p>
                        @error('address')
                            <p class="form-text text-danger">{{ $message }}</p>
                        @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Numero de telefono</label>
                        <input type="number" name="phone_number" class="form-control" placeholder="Numero de telefono" value="{{ old('phone_number') ?? @$teacher->phone_number }}">
                        <p class="form-text">Escribir el numero de telefono del estudiante</p>
                        @error('phone_number')
                            <p class="form-text text-danger">{{ $message }}</p>
                        @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="age" class="form-label">Edad</label>
                        <input type="number" name="age" class="form-control" placeholder="Edad del maestro" value="{{ old('age') ?? @$teacher->age }}">
                        <p class="form-text">Escribir la edad del maestro</p>
                        @error('age')
                            <p class="form-text text-danger">{{ $message }}</p>
                        @enderror
                    </div>
        
                    @if (isset($teacher))
                        <button type="submit" class="btn btn-success">Editar Maestro</button>
                    @else
                        <button type="submit" class="btn btn-success">Guardar Maestro</button>
                    @endif
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection