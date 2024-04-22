<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lista de Animales</title>
</head>
<body>
    <h1>Lista de Animales</h1>

    @foreach($animales as $animal)
    <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
        <h2>{{ $animal->NOMBRE }}</h2>
        <p><strong>Descripción:</strong> {{ $animal->DESCRIPCION }}</p>
        <p><strong>Imagen:</strong> {{ $animal->imagen }}</p>
        <p><strong>Color:</strong> {{ $animal->color->COLOR }}</p>
        <p><strong>Tamaño:</strong> {{ $animal->tamaño->TAMAÑO }}</p>
        <p><strong>Especie:</strong> {{ $animal->especie->ESPECIE }}</p>

        <button onclick="editarAnimal({{ $animal->ID }})">Editar</button>
        <button onclick="eliminarAnimal({{ $animal->ID }})">Eliminar</button>
    </div>
    @endforeach

    @if(count($animales) === 0)
    <p>No hay animales registrados.</p>
    @endif

    <script src="{{ asset('JavaScript/Animal/funciones.js') }}"></script>
</body>
</html>
