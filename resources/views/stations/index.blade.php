@extends('layouts.app')

@section('title', 'Lista de Estaciones')

@section('content')
<div class="container mt-4">
    <h3>Lista de Estaciones</h3>
    <a href="{{ route('stations.create') }}" class="btn btn-primary mb-3">+ Nueva Estación</a>

    @if (session('ok'))
        <div class="alert alert-success">{{ session('ok') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Ciudad</th>
                <th>Departamento</th>
                <th>País</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($stations as $station)
                <tr>
                    <td>{{ $station->id }}</td>
                    <td>{{ $station->name }}</td>
                    <td>{{ $station->code }}</td>
                    <td>{{ $station->city->name ?? 'N/A' }}</td>
                    <td>{{ $station->city->department->name ?? 'N/A' }}</td>
                    <td>{{ $station->city->department->country->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('stations.edit', $station->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('stations.destroy', $station->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No hay estaciones registradas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
