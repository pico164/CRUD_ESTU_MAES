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

                    <form class="form-inline">
                        @csrf
                        <div class="py-4">
                            <label for="subject_id" class="form-label">Nombre de la Asignatura</label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                @foreach ($detail as $nombre)
                                    <option value="{{ $nombre->id }}" {{ old('subject_id') == $nombre->id ? 'selected' : ''}}>{{ $nombre->name_subject }}</option>
                                @endforeach
                            </select>
                        </div>
                            <button type="submit" class="btn btn-success">Consultar</button>
                    </form>
            
                    <table class="table">
                        <thead>
                            <th>Estudiantes</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @forelse ($modelo as $students)
                                <tr>
                                    <td>{{ $students->name_students }}</td>
                                    <td>
                                         <form action="{{ route('detail.destroy', $studentdetail) }}" method="POST" class="d-inline">
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
                    @if ($modelo->count())
                        {{ $details->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    