@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subir Archivo</div>
                    <div class="card-body">
                        @if (session('info'))
                            <div class="alert alert-success" role="alert">
                                {{ session('info') }}
                            </div>
                        @endif
                        <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">

                            @method('POST')
                            @csrf

                            <div class="form-group">

                                <label>Cargar Archivo</label>
                                <input type="file" name="file" class="form-control-file" required>
                            </div>
                            @if (auth()->user()->hasRoles(['admin']))
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <select class="custom-select" name="usuario">
                                        <option selected disabled>Seleccionar usuario</option>
                                        @foreach ($usuarios as $usuario)
                                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Nota del archivo (opcional)</label>
                                <input type="text" name="note" class="form-control @error('note') is-invalid @enderror">
                                @error('note')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Elegir archivo</label>
  </div>
</div> --}}
                            <div class="form-group">

                                <input type="submit" value="Subir Archivo" class="btn btn-primary">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
