@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Lista de Sensores</h2>

    <a href="{{ route('sensors.create') }}" class="btn btn-primary mb-3">➕ Nuevo Sensor</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sensors as $sensor)
                <tr>
                    <td>{{ $sensor->id }}</td>
                    <td>{{ $sensor->name }}</td>
                    <td>{{ $sensor->type ?? 'N/A' }}</td>
                    <td>{{ $sensor->status ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <a href="{{ route('sensors.edit', $sensor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('sensors.destroy', $sensor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay sensores registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
