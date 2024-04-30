<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/compartido.css') }}">
    <title>Lista de Avisos</title>
</head>
<header>
    <h1>Lista de Avisos</h1>
    <div class="redirect">
        <button class="botonHeader" onclick="window.location.href = '{{ route('contactoExtra') }}'">Contactos</button>
        <button class="botonHeaderPrincipal" onclick="window.location.href = '{{ route('formAviso') }}'">Crear Nuevo Aviso</button>
        <button class="botonHeader" onclick="window.location.href = '{{ route('animal') }}'">Animales</button>
    </div class="redirect">
</header>
<body>

    <a class="cerrarSesion" href="{{ route('login') }}">Logout</a>

    <select id="estadoFiltro" onchange="filtroAvisos()" class="filtros">
        <option value="">Filtro</option>
        @foreach($estados as $estado)
            <option value="{{ $estado->ID }}">{{ $estado->ESTADO }}</option>
        @endforeach
    </select>

    </form>
    <div class="container">
        @foreach($avisos as $aviso)
        <div class="contenido" dataEstadoId="{{ $aviso->estado->ID }}">
        <p>{{ $aviso->animal ? $aviso->animal->IMAGEN : 'No disponible' }}</p>
        <h2><strong>C/: </strong>{{ $aviso->LUGARDESAPARECIDO }}</h2>
        <p><strong>Fecha desaparecido:</strong> {{ $aviso->FECHADESAPARECIDO }}</p>
        <p><strong>Nombre animal:</strong> {{ $aviso->animal ? $aviso->animal->NOMBRE : 'No disponible' }}</p>
        <p><strong>Nombre contacto:</strong> {{ $aviso->contactoextra ? $aviso->contactoextra->NOMBRE : 'No disponible' }}</p>
        <p><strong>Telefono contacto:</strong> {{ $aviso->contactoextra ? $aviso->contactoextra->TELEFONO : 'No disponible' }}</p>
        <p><strong>Email contacto:</strong> {{ $aviso->contactoextra ? $aviso->contactoextra->EMAIL : 'No disponible' }}</p>
        <p><strong>Estado:</strong> {{ $aviso->estado ? $aviso->estado->ESTADO : 'No disponible' }}</p>

        <button class="editar" onclick="window.location.href = '{{ route('Aviso.editAviso', ['id' => $aviso->ID]) }}'">Editar</button>
        <button class="eliminar" id="{{ $aviso->ID }}">Eliminar</button>
    </div>
        @endforeach
    </div>

@if(count($avisos) === 0)
    <p>No hay avisos registrados.</p>
@endif

    <script type="module" src="{{ asset('JavaScript/Aviso/aviso.js') }}"></script>

</body>
<footer><p>Fernando Sanchez Soto - 2024</p></footer>
</html>
