@extends('layout.app')
@section('title', 'Inicio')

@section('content')
<div class="container text-center" style="margin-top: 30px;">

    <!-- Título principal -->
    <h1 class="mb-4">Bienvenido a mi aplicación</h1>

    <!-- Galería de imágenes -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <img src="{{ asset('img/Internet_of_Things-1024x585 - copia.jpg') }}" 
                 alt="Imagen IoT 1"
                 style="width: 100%; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0,0,0,0.3);">
        </div>
        <div class="col-md-4 mb-3">
            <img src="{{ asset('img/What_is_IoT.jpg') }}" 
                 alt="Imagen IoT 2"
                 style="width: 100%; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0,0,0,0.3);">
        </div>
        <div class="col-md-4 mb-3">
            <img src="{{ asset('img/internet-de-las-cosas - copia.jpg') }}" 
                 alt="Imagen IoT 3"
                 style="width: 100%; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0,0,0,0.3);">
        </div>
    </div>

    <!-- Fila de botones -->
    <div class="row text-center mt-4">
        <div class="col border p-3" style="background-color:#ece3ff;">
            <a href="#" class="btn btn-primary w-100">Tabla</a>
        </div>
        <div class="col border p-3" style="background-color:#ece3ff;">
            <a href="#" class="btn btn-success w-100">Gráficas</a>
        </div>
        <div class="col border p-3" style="background-color:#ece3ff;">
            <a href="#" class="btn btn-warning w-100">Formularios</a>
        </div>
    </div>

    <div class="row text-center mt-3">
        <div class="col border p-3" style="background-color:#ece3ff;">
            <a href="#" class="btn btn-danger w-100">Registrar Datos</a>
        </div>
        <div class="col border p-3" style="background-color:#ece3ff;">
            <a href="#" class="btn btn-dark w-100">Inicio de Sesión</a>
        </div>
        <div class="col border p-3" style="background-color:#ece3ff;">
            <a href="#" class="btn btn-info w-100">Panel</a>
        </div>
    </div>

    <div class="row text-center mt-3">
        <div class="col border p-3" style="background-color:#ece3ff;">
            <a href="#" class="btn btn-secondary w-100">Dispositivos IoT</a>
        </div>
    </div>

</div>
@endsection
