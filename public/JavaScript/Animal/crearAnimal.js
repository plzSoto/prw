async function crearAnimal() {
    try {
        const nombre = document.getElementById("nombre").value;
        const descripcion = document.getElementById("descripcion").value;
        const imagen = document.getElementById("imagen").value;
        const colorId = document.getElementById("color_id").value;
        const tamañoId = document.getElementById("tamaño_id").value;
        const especieId = document.getElementById("especie_id").value;

        const animalData = {
            NOMBRE: nombre,
            DESCRIPCION: descripcion,
            IMAGEN: imagen,
            COLOR_ID: colorId,
            TAMAÑO_ID: tamañoId,
            ESPECIE_ID: especieId,
        };

        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        if (!csrfTokenMeta) {
            throw new Error("No se encontró el token CSRF");
        }
        const csrfToken = csrfTokenMeta.getAttribute("content");

        const response = await fetch("/animal/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(animalData),
        });

        if (!response.ok) {
            throw new Error("Error al crear el animal");
        }

        const responseData = await response.json();
        console.log("Animal creado exitosamente:", responseData);

        window.location.href = "animal";

        document.getElementById("formAnimal").reset();
    } catch (error) {
        console.error("Error al crear el animal:", error);
        alert("Error al crear el animal");
    }
}

export default crearAnimal;
