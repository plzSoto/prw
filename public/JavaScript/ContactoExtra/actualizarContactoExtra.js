import {
    limpiarMensajesError,
    validarCamposVacios,
} from "../Validaciones/validacionFormularios.js";

async function actualizarContactoExtra(contactoextraId) {
    try {
        const nombreElement = document.getElementById("nombre");
        const telefonoElement = document.getElementById("telefono");
        const emailElement = document.getElementById("email");

        // Verificar si los elementos están presentes en el DOM
        if (!nombreElement || !telefonoElement || !emailElement) {
            throw new Error("Uno o más elementos no se encontraron en el DOM.");
        }

        const nombre = nombreElement.value;
        const telefono = telefonoElement.value;
        const email = emailElement.value;

        const campos = [nombreElement, telefonoElement, emailElement];

        limpiarMensajesError(campos);

        const camposVacios = validarCamposVacios(campos);

        if (camposVacios) {
            throw new Error("Por favor completa todos los campos.");
        }

        const emailValido = validarEmail(email);

        if (!emailValido) {
            alert(
                "El email debe contener @gmail.com, @gmail.es, @hotmail.com, @hotmail.es, @yahoo.com, @yahoo.es"
            );
            return;
        }

        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        if (!csrfTokenMeta) {
            throw new Error("No se encontró el token CSRF");
        }

        const csrfToken = csrfTokenMeta.getAttribute("content");

        const contactoExtraData = {
            NOMBRE: nombre,
            TELEFONO: telefono,
            EMAIL: email,
        };

        const response = await fetch(`/contactoExtra/${contactoextraId}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(contactoExtraData),
        });

        if (!response.ok) {
            throw new Error("Error al actualizar el contacto extra");
        }

        window.location.href = "/contactoExtra";
    } catch (error) {
        console.error("Error al actualizar el contacto extra:", error.message);
    }
}

function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const dominiosPermitidos = [
        "@gmail.com",
        "@gmail.es",
        "@hotmail.com",
        "@hotmail.es",
        "@yahoo.com",
        "@yahoo.es",
    ];

    if (!regex.test(email)) {
        return false;
    }

    const dominio = email.substring(email.lastIndexOf("@"));
    return dominiosPermitidos.includes(dominio);
}

export default actualizarContactoExtra;
