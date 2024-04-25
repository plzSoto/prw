<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lista de Avisos</title>
</head>
<body>
    <h1>Lista de Avisos</h1>

    @foreach($avisos as $aviso)
    <div class="aviso-card" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
        <h2>{{ $aviso->LUGARDESAPARECIDO }}</h2>
        <p><strong>Fecha desaparecido:</strong> {{ $aviso->FECHADESAPARECIDO }}</p>
        <p><strong>Nombre animal:</strong> {{ $aviso->animal ? $aviso->animal->NOMBRE : 'No disponible' }}</p>
        <p><strong>Nombre contacto:</strong> {{ $aviso->contactoextra ? $aviso->contactoextra->NOMBRE : 'No disponible' }}</p>
        <p><strong>Estado:</strong> {{ $aviso->estado ? $aviso->estado->ESTADO : 'No disponible' }}</p>
        <button onclick="window.location.href = '{{ route('Aviso.editAviso', ['id' => $aviso->ID]) }}'">Editar</button>
        <button onclick="eliminarAviso({{ $aviso->ID }})">Eliminar</button>
    </div>
@endforeach

@if(count($avisos) === 0)
    <p>No hay avisos registrados.</p>
@endif


    <script src="{{ asset('JavaScript/Aviso/funciones.js') }}"></script>
</body>
</html>
