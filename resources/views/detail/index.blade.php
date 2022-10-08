@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="py-5 text-center">
                    <h1>Aplicativo Cursos</h1>
                    <a href="{{ route('detail.create') }}" class="btn btn-primary">Matriculas</a>
            
                    @if (Session::has('mensaje'))
                        <div class="alert alert-info my-5">
                            {{ Session::get('mensaje') }}
                        </div>
                    @endif
            
                    <table class="table">
                        <thead>
                            <th>Asignatura</th>
                            <th>Nombre del Maestro</th>
                            <th>Estudiantes</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
            {{--  
                            @forelse ($details as $detailsM)
                                <tr>
                                    <td>{{ $studentdetail->name_student }}</td>
                                    <td>{{ $studentdetail->address }}</td>
                                    <td>{{ $studentdetail->phone_number }}</td>
                                    <td>{{ $studentdetail->age }}</td>
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
                    @if ($details->count())
                        {{ $details->links() }}    
                    @endif
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    