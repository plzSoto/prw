async function actualizarAnimal(animalId) {
    try {
        const imagen = document.getElementById("imagen").value;
        const nombre = document.getElementById("nombre").value;
        const descripcion = document.getElementById("descripcion").value;
        const colorId = document.getElementById("color_id").value;
        const tamañoId = document.getElementById("tamaño_id").value;
        const especieId = document.getElementById("especie_id").value;

        const animalData = {
            IMAGEN: imagen,
            NOMBRE: nombre,
            DESCRIPCION: descripcion,
            COLOR_ID: colorId,
            TAMAÑO_ID: tamañoId,
            ESPECIE_ID: especieId,
        };

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        const response = await fetch(`/animal/${animalId}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(animalData),
        });

        if (!response.ok) {
            throw new Error("Error al actualizar el animal");
        }

        alert("Animal actualizado correctamente");

        window.location.href = "/animal";
    } catch (error) {
        console.error("Error al actualizar el animal:", error.message);
    }
}

export default actualizarAnimal;
