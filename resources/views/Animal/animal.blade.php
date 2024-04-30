<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/compartido.css') }}">
    <title>Lista de Animales</title>
</head>
    <header>
        <h1>Lista de Animales</h1>
        <div class="redirect">
            <button class="botonHeader" onclick="window.location.href = '{{ route('contactoExtra') }}'">Contactos</button>
            <button class="botonHeaderPrincipal" onclick="window.location.href = '{{ route('formAnimal') }}'">Crear Nuevo Animal</button>
            <button class="botonHeader" onclick="window.location.href = '{{ route('aviso') }}'">Avisos</button>
        </div class="redirect">
    </header>
<body>

    <a class="cerrarSesion" href="{{ route('login') }}">Logout</a>

    <select id="especieFiltro" onchange="filtroAnimales()" class="filtros">
        <option value="">Filtro</option>
        @foreach($especies as $especie)
            <option value="{{ $especie->ID }}">{{ $especie->ESPECIE }}</option>
        @endforeach
    </select>


    <div class="container">
        @foreach($animales as $animal)
            <div class="contenido" dataEspecieId="{{ $animal->especie->ID }}">
                <p>{{ $animal->IMAGEN }}</p>
                <h2>{{ $animal->NOMBRE }}</h2>
                <p><strong>Descripción:</strong> {{ $animal->DESCRIPCION }}</p>
                <p><strong>Color:</strong> {{ $animal->color->COLOR }}</p>
                <p><strong>Tamaño:</strong> {{ $animal->tamaño->TAMAÑO }}</p>
                <p><strong>Especie:</strong> {{ $animal->especie->ESPECIE }}</p>

                <button class="editar" onclick="window.location.href = '{{ route('Animal.editAnimal', ['id' => $animal->ID]) }}'">Editar</button>
                <button class="eliminar" id="eliminarAnimal{{ $animal->ID }}">Eliminar</button>
            </div>
        @endforeach
    </div>
    </div>

    @if(count($animales) === 0)
    <p>No hay animales registrados.</p>
    @endif

    <script type="module" src="{{ asset('JavaScript/Animal/animal.js') }}"></script>
</body>

<footer><p>Fernando Sanchez Soto - 2024</p></footer>
</html>
