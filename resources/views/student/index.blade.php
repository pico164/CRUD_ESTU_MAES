@extends('thema.base')
@section('content')
    <div class="container py-5 text-center">
        <h1>Aplicativo Cursos</h1>
        <a href="{{ route('student.create') }}" class="btn btn-primary">Crear Estudiantes</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <th>Estudiantes</th>
                <th>Direccion</th>
                <th>Telefeono</th>
                <th>Edad</th>
                <th>Acciones</th>
            </thead>
            <tbody>

                @forelse ($students as $studentdetail)
                    <tr>
                        <td>{{ $studentdetail->name_student }}</td>
                        <td>{{ $studentdetail->address }}</td>
                        <td>{{ $studentdetail->phone_number }}</td>
                        <td>{{ $studentdetail->age }}</td>
                        <td>{{ '' }}</td>
                        <td>{{ '' }}</td>
                        <td>
                             <a href="{{ route('student.edit', $studentdetail) }}" class="btn btn-warning">Editar</a>
                             <form action="{{ route('student.destroy', $studentdetail) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este estudiante?')">Eliminar</button>
                             </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay registros</td>
                    </tr>
                @endforelse
                
            </tbody>
        </table>
        @if ($students->count())
            {{ $students->links() }}    
        @endif
    </div>
@endsection