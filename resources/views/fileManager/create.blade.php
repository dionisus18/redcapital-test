<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subir Archivo</div>

                <div class="card-body">
                    <form
                    {{-- action="{{ route('uploads.store') }}" --}}
                    method="POST"
                    enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nombre del Archivo</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Cargar Archivo</label>
                        <input type="file" name="file" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        @csrf
                        <input type="submit" value="Subir Archivo" class="btn btn-primary">
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>