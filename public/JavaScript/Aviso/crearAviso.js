async function crearAviso() {
    try {
        const fechadesaparecido =
            document.getElementById("fechadesaparecido").value;
        const lugardesaparecido =
            document.getElementById("lugardesaparecido").value;
        const estadoId = document.getElementById("estado_id").value;
        const animalId = document.getElementById("animal_id").value;
        const contactoextraId =
            document.getElementById("contactoextra_id").value;

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

        const response = await fetch("/aviso/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(avisoData),
        });

        if (!response.ok) {
            throw new Error("Error al crear el aviso");
        }

        const responseData = await response.json();
        console.log("Aviso creado exitosamente:", responseData);

        window.location.href = "aviso";

        document.getElementById("formAviso").reset();
    } catch (error) {
        console.error("Error al crear el aviso:", error);
    }
}

export default crearAviso;
