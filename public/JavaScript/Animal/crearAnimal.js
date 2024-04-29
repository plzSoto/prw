import {
    limpiarMensajesError,
    validarCamposVacios,
} from "../Validaciones/validacionFormularios.js";

async function crearAnimal() {
    try {
        const nombre = document.getElementById("nombre");
        const descripcion = document.getElementById("descripcion");
        const imagen = document.getElementById("imagen");
        const colorId = document.getElementById("color_id");
        const tamañoId = document.getElementById("tamaño_id");
        const especieId = document.getElementById("especie_id");

        const campos = [
            nombre,
            descripcion,
            imagen,
            colorId,
            tamañoId,
            especieId,
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

        const animalData = {
            NOMBRE: nombre.value,
            DESCRIPCION: descripcion.value,
            IMAGEN: imagen.value,
            COLOR_ID: colorId.value,
            TAMAÑO_ID: tamañoId.value,
            ESPECIE_ID: especieId.value,
        };

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
    }
}

export default crearAnimal;
