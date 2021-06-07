@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Listado de menus</div>
        <div class="card-body">
            @if ($errors)
                <div class="alert alert-error" role="alert">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('info'))
                <div class="alert alert-success" role="alert">
                    {{ session('info') }}
                </div>
            @endif
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Rol</th>
                        <th scope="col" class="text-center">SubMenus</th>
                        <th scope="col" colspan="1" class="text-center">Accion</th>
                        <th scope="col" class="text-center">Fecha de Carga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        {{-- @if ($menu->owner == Auth::user()->get_name) --}}
                        <tr>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->role->display_name }}</td>
                            <td>
                                @foreach ($menu->routes as $route)
                                    {{ $route->name }}
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('menus.destroy', $menu) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger"
                                        onclick="return confirm('¿Seguro que desea eliminar menu?')">
                                </form>
                            </td>
                            {{-- <td>
                                <a class="btn btn-primary" href="{{ route('menus.edit', $menu) }}">
                                    Editar
                                </a>
                            </td> --}}
                            <td>{{ $menu->updated_at->format('d-m-Y') }}</td>
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
