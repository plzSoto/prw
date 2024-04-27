<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/ContactoExtra/formContactoExtra.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botones.css') }}">
    <title>Crear Nuevo Contacto Extra</title>
</head>
<body>

<h1>Crear Nuevo Contacto Extra</h1>

<form id="formContactoExtra">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" required><br><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email"><br><br>

    <button class="crear" type="button" id="createContactoExtra">Crear Contacto Extra</button>
</form>

<script src="{{ asset('JavaScript/ContactoExtra/funciones.js') }}"></script>

</body>
</html>
