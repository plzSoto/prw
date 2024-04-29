import {
    limpiarMensajesError,
    validarCamposVacios,
} from "../Validaciones/validacionFormularios.js";

async function crearContactoExtra() {
    try {
        const nombre = document.getElementById("nombre");
        const telefono = document.getElementById("telefono");
        const email = document.getElementById("email");

        const campos = [nombre, telefono, email];

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

        const contactoExtraData = {
            NOMBRE: nombre.value,
            TELEFONO: telefono.value,
            EMAIL: email.value,
        };

        const response = await fetch("/contactoExtra/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(contactoExtraData),
        });

        if (!response.ok) {
            throw new Error("Error al crear el contacto extra");
        }

        const responseData = await response.json();
        console.log("Contacto extra creado exitosamente:", responseData);

        window.location.href = "contactoExtra";

        document.getElementById("formContactoExtra").reset();
    } catch (error) {
        console.error("Error al crear el contacto extra:", error);
    }
}

export default crearContactoExtra;
