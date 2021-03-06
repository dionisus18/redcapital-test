@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Listado de archivos</div>
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-info" role="alert">
                    {{ session('info') }}
                </div>
            @endif
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Nota</th>
                        <th scope="col" class="text-center">Fecha de Carga</th>
                        <th scope="col" colspan="3" class="text-center">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($archivos as $archivo)

                        {{-- @if ($archivo->owner == Auth::user()->get_name) --}}
                        <tr>
                            <td>{{ $archivo->name }}</td>
                            <td>{{ $archivo->note }}</td>
                            <td>{{ $archivo->updated_at->format('d-m-Y') }}</td>
                            <td>
                                <form action="{{ route('archivos.destroy', $archivo) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger"
                                        onclick="return confirm('¿Seguro que desea eliminar archivo?')">
                                </form>
                            </td>
                            {{-- <td>
                                <a class="btn btn-primary" href="{{ route('archivos.edit', $archivo) }}">
                                    Editar
                                </a>
                            </td> --}}
                            <td>
                                @if ($archivo->name[0] !== '/')
                                    <a class="btn btn-primary" href="{{ Storage::url($archivo->path) }}">
                                        Descargar
                                    </a>
                                @endif
                            </td>

                        </tr>
                        {{-- @endif --}}
                        {{-- @if ($loop->first)
                            {{ dd(Storage::url($archivo->path)) }}
                        @endif --}}
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $uploads->links("pagination::bootstrap-4") }} --}}
        </div>
    </div>
    </div>

@endsection
