async function actualizarContactoExtra(contactoextraId) {
    try {
        const nombre = document.getElementById("nombre").value;
        const telefono = document.getElementById("telefono").value;
        const email = document.getElementById("email").value;

        const contactoExtraData = {
            NOMBRE: nombre,
            TELEFONO: telefono,
            EMAIL: email,
        };

        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        if (!csrfTokenMeta) {
            throw new Error("No se encontró el token CSRF");
        }

        const csrfToken = csrfTokenMeta.getAttribute("content");

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

export default actualizarContactoExtra;
