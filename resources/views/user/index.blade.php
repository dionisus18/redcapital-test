@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Listado de usuarios</div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Rol</th>
                        <th scope="col" class="text-center">Fecha de Carga</th>
                        <th scope="col" colspan="1" class="text-center">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                        {{-- @if ($archivo->owner == Auth::user()->get_name) --}}
                        <tr>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->role->display_name }}</td>
                            <td>{{ $u->updated_at->format('d-m-Y') }}</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-primary" href="{{ route('usuarios.edit', $u) }}">
                                    Editar
                                </a>
                            </td>
                        </tr>
                        {{-- @endif --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
