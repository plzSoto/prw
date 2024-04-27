<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/ContactoExtra/contactoExtra.css') }}">
    <link rel="stylesheet" href="{{ asset('css/botones.css') }}">
    <title>Lista de Contactos extras</title>
</head>
<body>
    <h1>Lista de Contactos extras</h1>

    <div class="container">
        @foreach($contactosExtras as $contactoExtra)
        <div class="contactoExtra">
            <h2>{{ $contactoExtra->NOMBRE }}</h2>
            <p><strong>Telefono:</strong> {{ $contactoExtra->TELEFONO }}</p>
            <p><strong>Email:</strong> {{ $contactoExtra->EMAIL }}</p>

            <button class="editar" onclick="window.location.href = '{{ route('ContactoExtra.editContactoExtra', ['id' => $contactoExtra->ID]) }}'">Editar</button>
            <button class="eliminar" onclick="eliminarContactoExtra({{ $contactoExtra->ID }})">Eliminar</button>
        </div>
        @endforeach
    </div>

    @if(count($contactosExtras) === 0)
        <p>No hay contactos extras registrados.</p>
    @endif

    <script src="{{ asset('JavaScript/ContactoExtra/funciones.js') }}"></script>
</body>
</html>
