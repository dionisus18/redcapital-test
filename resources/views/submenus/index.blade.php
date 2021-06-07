@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Listado de menus</div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" colspan="2" class="text-center">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submenus as $submenu)
                        {{-- @if ($submenu->owner == Auth::user()->get_name) --}}
                        <tr>
                            <td>{{ $submenu->name }}</td>
                            <td>
                                <form action="{{ route('menus.destroy', $submenu) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger"
                                        onclick="return confirm('¿Seguro que desea eliminar submenu?')">
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('menus.edit', $submenu) }}">
                                    Editar
                                </a>
                            </td>
                        </tr>
                        {{-- @endif --}}
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $uploads->links("pagination::bootstrap-4") }} --}}
        </div>
    </div>
    </div>

@endsection
