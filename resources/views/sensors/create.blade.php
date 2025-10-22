@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Registrar Nuevo Sensor</h2>

    <form action="{{ route('sensors.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del sensor</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Ej: Sensor Temperatura" required>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Código</label>
            <input type="text" name="code" id="code" class="form-control" placeholder="Ej: TMP-01" required>
        </div>

        <div class="mb-3">
            <label for="abbrev" class="form-label">Abreviatura</label>
            <input type="text" name="abbrev" id="abbrev" class="form-control" placeholder="Ej: TMP">
        </div>

        <div class="mb-3">
            <label for="id_department" class="form-label">Departamento</label>
            <select name="id_department" id="id_department" class="form-select" required>
                <option value="">Seleccione un departamento</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Sensor</button>
        <a href="{{ route('sensors.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
