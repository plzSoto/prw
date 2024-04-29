<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/compartido.css') }}">
    <link rel="stylesheet" href="{{ asset('css/errorForm.css') }}">

    <title>Crear Nuevo Animal</title>
</head>
    <header>
        <h1>Crear nuevo Animal</h1>
        <button class="botonHeaderCancelar" onclick="window.location.href = '{{ route('animal') }}'">Cancelar</button>
    </header>
<body>

    <form id="formAnimal">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" required></textarea><br><br>

        <label for="imagen">Imagen:</label>
        <input type="text" id="imagen" required><br><br>

        <label for="color_id">Color:</label>
        <select id="color_id" required>
            <option value="">Seleccionar Color</option>
        </select><br><br>

        <label for="tamaño_id">Tamaño:</label>
        <select id="tamaño_id" required>
            <option value="">Seleccionar Tamaño</option>
        </select><br><br>

        <label for="especie_id">Especie:</label>
        <select id="especie_id" required>
            <option value="">Seleccionar Especie</option>
        </select><br><br>

        <button class="crear" type="button" id="crearAnimal">Crear Animal</button>
    </form>

    <script type="module" src="{{ asset('JavaScript/Animal/animal.js') }}"></script>
</body>
<footer><p>Fernando Sanchez Soto - 2024</p></footer>
</html>
