@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container py-5 text-center">
                    <h1>Aplicativo Cursos</h1>
                    <a href="{{ route('teacher.create') }}" class="btn btn-primary">Crear Maestro</a>
            
                    @if (Session::has('mensaje'))
                        <div class="alert alert-info my-5">
                            {{ Session::get('mensaje') }}
                        </div>
                    @endif
            
                    <table class="table">
                        <thead>
                            <th>Maestro</th>
                            <th>Direccion</th>
                            <th>Telefeono</th>
                            <th>Edad</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
            
                            @forelse ($teachers as $teacherdetail)
                                <tr>
                                    <td>{{ $teacherdetail->name_teacher }}</td>
                                    <td>{{ $teacherdetail->address }}</td>
                                    <td>{{ $teacherdetail->phone_number }}</td>
                                    <td>{{ $teacherdetail->age }}</td>
                                    <td>
                                         <a href="{{ route('teacher.edit', $teacherdetail) }}" class="btn btn-warning">Editar</a>
                                         <form action="{{ route('teacher.destroy', $teacherdetail) }}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este maestro ?')">Eliminar</button>
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
                    @if ($teachers->count())
                        {{ $teachers->links() }}    
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection