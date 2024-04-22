<!-- resources/views/animals/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Animales</title>
</head>
<body>
    <h1>Lista de Animales</h1>

    @foreach($animales as $animal)
    <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
        <h2>{{ $animal->NOMBRE }}</h2>
        <p><strong>Descripción:</strong> {{ $animal->DESCRIPCION }}</p>
        <p><strong>Color:</strong> {{ $animal->color->COLOR }}</p>
        <p><strong>Tamaño:</strong> {{ $animal->tamaño->TAMAÑO }}</p>
        <p><strong>Especie:</strong> {{ $animal->especie->ESPECIE }}</p>
        <img src="{{ $animal->IMAGEN }}" style="max-width: 300px;">

        <!-- Botón para eliminar el animal -->
        <button onclick="eliminarAnimal({{ $animal->ID }})">Eliminar</button>
    </div>
    @endforeach

    @if(count($animales) === 0)
    <p>No hay animales registrados.</p>
    @endif

    <!-- JavaScript para la función de eliminación -->
    <script>
        async function eliminarAnimal(animalId) {
            try {
                const response = await fetch(`/animal/destroy/${animalId}`, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                    },
                });

                if (!response.ok) {
                    throw new Error("Error al eliminar el animal"); // Lanzar un error si la respuesta no es exitosa
                }

                const responseData = await response.json();
                console.log("Animal eliminado exitosamente:", responseData);

                // Recargar la página después de eliminar el animal
                location.reload();

            } catch (error) {
                console.error("Error al eliminar el animal:", error.message); // Mostrar el mensaje de error en la consola
                alert("Error al eliminar el animal. Por favor, inténtalo de nuevo."); // Mostrar una alerta al usuario
            }
        }
    </script>
</body>
</html>
