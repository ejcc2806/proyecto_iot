@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="mb-4">Panel IoT</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sensores activos</h5>
                    <p class="display-6">{{ $sensorsOnline }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Última sincronización</h5>
                    <p class="display-6">{{ $lastSync ?? 'Sin datos' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-dark mb-3">
                <div class="card-body">
                    <h5 class="card-title">Base de datos</h5>
                    <p class="display-6">{{ $dbDriver }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            Gráfica de Temperatura y Humedad
        </div>
        <div class="card-body">
            <canvas id="telemetryChart"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('telemetryChart').getContext('2d');
        const telemetryChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [
                    { label: 'Temperatura (°C)', data: [], borderColor: 'red' },
                    { label: 'Humedad (%)', data: [], borderColor: 'blue' }
                ]
            }
        });
    </script>
</div>
@endsection
