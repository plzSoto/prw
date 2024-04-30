<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/compartido.css') }}">
    <title>Lista de Contactos extras</title>
</head>
    <header>
        <h1>Lista de Contactos</h1>
        <div class="redirect">
            <button class="botonHeader" onclick="window.location.href = '{{ route('animal') }}'">Animales</button>
            <button class="botonHeaderPrincipal" onclick="window.location.href = '{{ route('formContactoExtra') }}'">Crear Nuevo Contacto</button>
            <button class="botonHeader" onclick="window.location.href = '{{ route('aviso') }}'">Avisos</button>
        </div class="redirect">
    </header>
<body>

    <a class="cerrarSesion" href="{{ route('login') }}">Logout</a>

    <div class="container">
        @foreach($contactosExtras as $contactoExtra)
        <div class="contenido">
            <h2>{{ $contactoExtra->NOMBRE }}</h2>
            <p><strong>Telefono:</strong> {{ $contactoExtra->TELEFONO }}</p>
            <p><strong>Email:</strong> {{ $contactoExtra->EMAIL }}</p>

            <button class="editar" onclick="window.location.href = '{{ route('ContactoExtra.editContactoExtra', ['id' => $contactoExtra->ID]) }}'">Editar</button>
            <button class="eliminar" id="{{$contactoExtra->ID }}">Eliminar</button>
        </div>
        @endforeach
    </div>

    @if(count($contactosExtras) === 0)
        <p>No hay contactos extras registrados.</p>
    @endif

    <script type="module" src="{{ asset('JavaScript/ContactoExtra/contactoExtra.js') }}"></script>
</body>
<footer><p>Fernando Sanchez Soto - 2024</p></footer>
</html>
