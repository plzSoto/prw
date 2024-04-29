<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/compartido.css') }}">
    <title>Editar Aviso</title>
</head>
    <header>
        <h1>Editar Aviso</h1>
        <button class="botonHeaderCancelar" onclick="window.location.href = '{{ route('aviso') }}'">Cancelar</button>
    </header>
<body>
    <form id="editAvisoForm">
        <label for="lugardesaparecido">Lugar desaparecido:</label>
        <textarea id="lugardesaparecido" required>{{ $aviso->LUGARDESAPARECIDO }}</textarea><br><br>

        <label for="fechadesaparecido">Fecha desaparecido:</label>
        <input type="datetime-local" id="fechadesaparecido" value="{{ $aviso->FECHADESAPARECIDO }}" required><br><br>

        <label for="animal_id">Animal:</label>
        <select id="animal_id" required>
            <option value="{{ $aviso->ANIMAL_ID }}">{{ $aviso->animal ? $aviso->animal->NOMBRE : 'Seleccionar animal' }}</option>
        </select><br><br>

        <label for="contactoextra_id">Contacto extra:</label>
        <select id="contactoextra_id" required>
            <option value="{{ $aviso->CONTACTOEXTRA_ID }}">{{ $aviso->contactoextra ? $aviso->contactoextra->TELEFONO : 'Seleccionar contacto extra' }}</option>
        </select><br><br>

        <label for="estado_id">Estado:</label>
        <select id="estado_id" required>
            <option value="{{ $aviso->ESTADO_ID }}">{{ $aviso->estado ? $aviso->estado->ESTADO : 'Seleccionar estado' }}</option>
        </select><br><br>

        <button class="editar" id="{{ $aviso->ID }}">Editar</button>
    </form>

    <script type="module" src="{{ asset('JavaScript/Aviso/aviso.js') }}"></script>
</body>
<footer><p>Fernando Sanchez Soto - 2024</p></footer>
</html>
