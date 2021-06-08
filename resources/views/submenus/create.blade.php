@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Creación de nuevo SubMenu</div>
                    <div class="card-body">
                        @if (session('info'))
                            <div class="alert alert-success" role="alert">
                                {{ session('info') }}
                            </div>
                        @endif
                        <form action="{{ route('submenus.store') }}" method="POST">

                            @method('POST')
                            @csrf

                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" value="{{ old('name') }}" name="name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ruta/URI</label>
                                <input type="text" value="{{ old('route') }}" name="route"
                                    class="form-control @error('route') is-invalid @enderror">
                                @error('route')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
