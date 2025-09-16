@extends('layout.app')
@section('title', 'Inicio')

<div class="container" style="margin-top: 20px; text-align: center;">

  <!-- Título principal -->
  <h1>Bienvenido a mi aplicación</h1>

  <!-- Imagen -->
  <img src="{{ asset('img/Internet_of_Things-1024x585 - copia.jpg') }}" 
       alt="Imagen de ejemplo" 
       style="width: 100%; max-width: 400px; margin: 20px 0;">

  <!-- Botones -->
  <div>
    <a href="#" class="btn btn-primary">Tabla</a>
    <a href="#" class="btn btn-success">Gráficas</a>
    <a href="#" class="btn btn-warning">Formularios</a>
    <a href="#" class="btn btn-danger">Datos del registrador</a>
  </div>

</div>
