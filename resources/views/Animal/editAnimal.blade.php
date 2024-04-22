<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editar Animal</title>
</head>
<body>
    <h1>Editar Animal</h1>
    <form id="editAnimalForm">
        <input type="hidden" id="animalId">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre"><br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion"></textarea><br>
        <label for="imagen">Imagen:</label>
        <input type="text" id="imagen"><br>
        <label for="color_id">Color:</label>
        <select id="color_id">
            <!-- Opciones de color se cargarán dinámicamente -->
        </select><br>
        <label for="tamaño_id">Tamaño:</label>
        <select id="tamaño_id">
            <!-- Opciones de tamaño se cargarán dinámicamente -->
        </select><br>
        <button id="editAnimal">Editar Animal</button>
    </form>

    <script src="{{ asset('JavaScript/Animal/funciones.js') }}"></script>
</body>
</html>
