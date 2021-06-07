@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Listado de menus</div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Rol</th>
                        <th scope="col" class="text-center">SubMenus</th>
                        <th scope="col" colspan="2" class="text-center">Accion</th>
                        <th scope="col" class="text-center">Fecha de Carga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $submenu)
                        {{-- @if ($submenu->owner == Auth::user()->get_name) --}}
                        <tr>
                            <td>{{ $submenu->name }}</td>
                            <td>{{ $submenu->role->display_name }}</td>
                            <td>
                                @foreach ($submenu->routes as $route)
                                    {{ $route->name }}
                                @endforeach
                            </td>
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
                            <td>{{ $submenu->updated_at->format('d-m-Y') }}</td>
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
