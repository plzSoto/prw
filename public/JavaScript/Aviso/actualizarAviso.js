async function actualizarAviso(avisoId) {
    try {
        const fechadesaparecido =
            document.getElementById("fechadesaparecido").value;
        const lugardesaparecido =
            document.getElementById("lugardesaparecido").value;
        const animalId = document.getElementById("animal_id").value;
        const contactoextraId =
            document.getElementById("contactoextra_id").value;
        const estadoId = document.getElementById("estado_id").value;

        const avisoData = {
            FECHADESAPARECIDO: fechadesaparecido,
            LUGARDESAPARECIDO: lugardesaparecido,
            ANIMAL_ID: animalId,
            CONTACTOEXTRA_ID: contactoextraId,
            ESTADO_ID: estadoId,
        };

        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        if (!csrfTokenMeta) {
            throw new Error("No se encontró el token CSRF");
        }
        const csrfToken = csrfTokenMeta.getAttribute("content");

        const response = await fetch(`/aviso/${avisoId}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(avisoData),
        });

        if (!response.ok) {
            throw new Error("Error al actualizar el aviso");
        }

        alert("Aviso actualizado correctamente");

        window.location.href = "/aviso";
    } catch (error) {
        console.error("Error al actualizar el aviso:", error.message);
    }
}

export default actualizarAviso;
