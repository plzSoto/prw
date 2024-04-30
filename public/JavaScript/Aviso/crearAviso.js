import {
    limpiarMensajesError,
    validarCamposVacios,
} from "../Validaciones/validacionFormularios.js";

async function crearAviso() {
    try {
        const fechadesaparecido = document.getElementById("fechadesaparecido");
        const lugardesaparecido = document.getElementById("lugardesaparecido");
        const estadoId = document.getElementById("estado_id");
        const animalId = document.getElementById("animal_id");
        const contactoextraId = document.getElementById("contactoextra_id");

        const campos = [
            fechadesaparecido,
            lugardesaparecido,
            estadoId,
            animalId,
            contactoextraId,
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

        const existeAviso = await verificarExistenciaAviso(animalId.value);
        if (existeAviso) {
            alert("Ya existe un aviso para este animal");
            throw new Error("Ya existe un aviso con este ANIMAL_ID");
        }

        const avisoData = {
            FECHADESAPARECIDO: fechadesaparecido.value,
            LUGARDESAPARECIDO: lugardesaparecido.value,
            ANIMAL_ID: animalId.value,
            CONTACTOEXTRA_ID: contactoextraId.value,
            ESTADO_ID: estadoId.value,
        };

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

async function verificarExistenciaAviso(animalId) {
    const response = await fetch(`/aviso/existe/${animalId}`);
    if (!response.ok) {
        throw new Error("Error al verificar la existencia del aviso");
    }
    const data = await response.json();
    return data.existe;
}

export default crearAviso;
