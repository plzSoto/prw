<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/compartido.css') }}">
    <link rel="stylesheet" href="{{ asset('css/errorForm.css') }}">
    <title>Crear Nuevo Contacto Extra</title>
</head>
    <header>
        <h1>Crear nuevo Contacto</h1>
        <button class="botonHeaderCancelar" onclick="window.location.href = '{{ route('contactoExtra') }}'">Cancelar</button>
    </header>
<body>

<form id="formContactoExtra">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" required><br><br>

    <label for="telefono">Teléfono:</label>
    <input type="number" id="telefono" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email"><br><br>

    <button class="crear" type="button" id="crearContactoExtra">Crear Contacto Extra</button>
</form>

<script type="module" src="{{ asset('JavaScript/ContactoExtra/contactoExtra.js') }}"></script>

</body>
<footer><p>Fernando Sanchez Soto - 2024</p></footer>
</html>
