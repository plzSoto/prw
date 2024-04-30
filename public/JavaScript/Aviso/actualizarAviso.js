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

        const campos = [
            fechadesaparecido,
            lugardesaparecido,
            animalId,
            contactoextraId,
            estadoId,
        ];

        limpiarMensajesError(campos);

        const camposVacios = validarCamposVacios(campos);

        if (camposVacios) {
            throw new Error("Por favor completa todos los campos.");
        }

        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        if (!csrfTokenMeta) {
            throw new Error("No se encontró el token CSRF");
        }
        const csrfToken = csrfTokenMeta.getAttribute("content");

        const existeAviso = await verificarExistenciaAviso(animalId, avisoId);
        if (existeAviso) {
            alert("Ya existe un aviso para este animal");
            throw new Error("Ya existe un aviso con este ANIMAL_ID");
        }

        const avisoData = {
            FECHADESAPARECIDO: fechadesaparecido,
            LUGARDESAPARECIDO: lugardesaparecido,
            ANIMAL_ID: animalId,
            CONTACTOEXTRA_ID: contactoextraId,
            ESTADO_ID: estadoId,
        };

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

        window.location.href = "/aviso";
    } catch (error) {
        console.error("Error al actualizar el aviso:", error.message);
    }
}

export default actualizarAviso;
