<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/compartido.css') }}">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form id="loginForm">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br><br>

        <button class="iniciarSesion" type="submit" href="{{ route('aviso') }}">Iniciar sesión</button>

        <a class="sinSesion" href="{{ route('aviso') }}">Contrinuar sin iniciar sesion</a>
    </form>


    <div id="mensajeError"></div>

    <footer><p>Fernando Sanchez Soto - 2024</p></footer>

    {{-- <script>
        const verificarUsuarioURL = "{{ route('verificarUsuario') }}";
    </script>
    <script type="module" src="{{ asset('JavaScript/Login/login.js') }}"></script> --}}
</body>
</html>
