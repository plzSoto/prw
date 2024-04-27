<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Animal/animal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botones.css') }}">
    <title>Lista de Animales</title>
</head>
<body>
    <h1>Lista de Animales</h1>

@foreach($animales as $animal)
<div class="animal">
    <p>{{ $animal->IMAGEN }}</p>
    <h2>{{ $animal->NOMBRE }}</h2>
    <p><strong>Descripción:</strong> {{ $animal->DESCRIPCION }}</p>
    <p><strong>Color:</strong> {{ $animal->color->COLOR }}</p>
    <p><strong>Tamaño:</strong> {{ $animal->tamaño->TAMAÑO }}</p>
    <p><strong>Especie:</strong> {{ $animal->especie->ESPECIE }}</p>

    <button class="editar" onclick="window.location.href = '{{ route('Animal.editAnimal', ['id' => $animal->ID]) }}'">Editar</button>
    <button class="eliminar" onclick="eliminarAnimal({{ $animal->ID }})">Eliminar</button>
</div>
@endforeach

@if(count($animales) === 0)
<p>No hay animales registrados.</p>
@endif

<!-- Include your JavaScript file for handling frontend functionality -->
<script src="{{ asset('JavaScript/Animal/funciones.js') }}"></script>
</body>
</html>
