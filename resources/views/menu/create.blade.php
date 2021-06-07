@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Creación de nuevo Menu</div>
                    <div class="card-body">
                        @if (session('info'))
                            <div class="alert alert-success" role="alert">
                                {{ session('info') }}
                            </div>
                        @endif
                        <form action="{{ route('menus.store') }}" method="POST">

                            @method('POST')
                            @csrf

                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Rol</label>
                                <select class="custom-select" name="rol">
                                    <option selected disabled>Seleccionar rol</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->display_name }}</option>
                                    @endforeach
                                </select>
                                @error('note')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Listado de submenus</label>
                                @foreach ($submenus as $route)
                                    <div class="custom-control custom-switch">
                                        <input name="submenus[]" value="{{ $route->id }}" type="checkbox"
                                            class="custom-control-input" id="route{{ $route->id }}">
                                        <label class="custom-control-label" for="route{{ $route->id }}">
                                            {{ $route->name }}
                                        </label>
                                        @error('note')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Guardar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
