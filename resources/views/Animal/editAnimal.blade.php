<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/compartido.css') }}">
    <title>Editar Animal</title>
</head>
    <header>
        <h1>Editar Animal</h1>
        <button class="botonHeaderCancelar" onclick="window.location.href = '{{ route('animal') }}'">Cancelar</button>
    </header>
<body>
    <form id="editAnimalForm">
        <label for="imagen">Imagen:</label>
        <input type="text" id="imagen" value="{{ $animal->IMAGEN }}" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" value="{{ $animal->NOMBRE }}" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" required>{{ $animal->DESCRIPCION }}</textarea><br><br>

        <label for="color_id">Color:</label>
        <select id="color_id" required>
            <option value="{{ $animal->COLOR_ID }}">{{ $animal->color->COLOR }}</option>
        </select><br><br>

        <label for="tamaño_id">Tamaño:</label>
        <select id="tamaño_id" required>
            <option value="{{ $animal->TAMAÑO_ID }}">{{ $animal->tamaño->TAMAÑO }}</option>
        </select><br><br>

        <label for="especie_id">Especie:</label>
        <select id="especie_id" required>
            <option value="{{ $animal->ESPECIE_ID }}">{{ $animal->especie->ESPECIE }}</option>
        </select><br><br>

        <button class="editar" id="{{ $animal->ID }}">Editar</button>
    </form>

    <script type="module" src="{{ asset('JavaScript/Animal/animal.js') }}"></script>

</body>
<footer><p>Fernando Sanchez Soto - 2024</p></footer>
</html>
