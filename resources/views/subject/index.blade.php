@extends('thema.base')
@section('content')
    <div class="container py-5 text-center">
        <h1>Aplicativo Cursos</h1>
        <a href="{{ route('subject.create') }}" class="btn btn-primary">Crear Asignatura</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <th>Asignatura</th>
                <th>Curso</th>
                <th>Maestro</th>
            </thead>
            <tbody>
                @forelse ($subject as $subjectdetail)
                    <tr>
                        <td>{{ $subjectdetail->name_subject }}</td>
                        <td>{{ $subjectdetail->curse }}</td>
                        @foreach ($Cteacher as $detalle)
                            <td>{{ $detalle->name_teacher }}</td>
                        @endforeach
                        
                        <td>
                             <a href="{{ route('subject.edit', $subjectdetail) }}" class="btn btn-warning">Editar</a>
                             <form action="{{ route('subject.destroy', $subjectdetail) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar esta asignatura ?')">Eliminar</button>
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
        @if ($subject->count())
            {{ $subject->links() }}    
        @endif
    </div>
@endsection