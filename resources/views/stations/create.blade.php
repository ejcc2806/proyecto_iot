@extends('layouts.app')

@section('title', 'Nueva Estación')

@section('content')
<div class="container mt-4">
    <h3>Registrar Nueva Estación</h3>

    <form action="{{ route('stations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Código:</label>
            <input type="text" name="code" id="code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_city" class="form-label">Ciudad:</label>
            <select name="id_city" id="id_city" class="form-select" required>
                <option value="">Seleccione una ciudad</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('stations.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
