<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Aviso/formAviso.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botones.css') }}">

    <title>Crear Nuevo Aviso</title>
</head>
<body>

<h1>Crear Nuevo Aviso</h1>

<form id="crear-aviso-form">
    <label for="fechadesaparecido">Fecha desaparecido:</label>
    <input type="datetime-local" id="fechadesaparecido" required><br><br>

    <label for="lugardesaparecido">Lugar desaparecido:</label>
    <textarea id="lugardesaparecido" required></textarea><br><br>


    <label for="animal_id">Animal:</label>
    <select id="animal_id" required>
        <option value="">Seleccionar Animal</option>
    </select><br><br>

    <label for="contactoextra_id">Contacto extra:</label>
    <select id="contactoextra_id" >
        <option value="">Seleccionar Contacto extra</option>
    </select><br><br>

    <label for="estado_id">Estado:</label>
    <select id="estado_id" required>
        <option value="">Seleccionar Estado</option>
    </select><br><br>

    <button class="crear" type="button" id="crearAviso">Crear Aviso</button>
</form>

<script type="module" src="{{ asset('JavaScript/Aviso/aviso.js') }}"></script>

</body>
</html>
