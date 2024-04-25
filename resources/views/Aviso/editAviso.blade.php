<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editar Aviso</title>
</head>
<body>
    <h1>Editar Aviso</h1>
    <form id="editAvisoForm">
        <label for="lugardesaparecido">Lugar desaparecido:</label>
        <textarea id="lugardesaparecido" required>{{ $aviso->LUGARDESAPARECIDO }}</textarea><br><br>

        <label for="fechadesaparecido">Fecha desaparecido:</label>
        <input type="datetime-local" id="fechadesaparecido" value="{{ $aviso->FECHADESAPARECIDO }}" required><br><br>

        <label for="animal_id">Animal:</label>
        <select id="animal_id" required>
            <option value="{{ $aviso->ANIMAL_ID }}">{{ $aviso->animal ? $aviso->animal->NOMBRE : 'Seleccionar animal' }}</option>
            <!-- Aquí puedes agregar más opciones si corresponde -->
        </select><br><br>

        <label for="contactoextra_id">Contacto extra:</label>
        <select id="contactoextra_id" required>
            <option value="{{ $aviso->CONTACTOEXTRA_ID }}">{{ $aviso->contactoextra ? $aviso->contactoextra->NOMBRE : 'Seleccionar contacto extra' }}</option>
            <!-- Aquí puedes agregar más opciones si corresponde -->
        </select><br><br>

        <label for="estado_id">Estado:</label>
        <select id="estado_id" required>
            <option value="{{ $aviso->ESTADO_ID }}">{{ $aviso->estado ? $aviso->estado->ESTADO : 'Seleccionar estado' }}</option>
            <!-- Aquí puedes agregar más opciones si corresponde -->
        </select><br><br>

        <button type="button" onclick="actualizarAviso({{ $aviso->ID }})">Actualizar</button>
    </form>

    <script src="{{ asset('JavaScript/Aviso/funciones.js') }}"></script>
</body>
</html>
