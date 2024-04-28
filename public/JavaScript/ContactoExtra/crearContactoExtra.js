async function crearContactoExtra() {
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
        alert(
            "Error al crear el contacto extra. Por favor, inténtalo de nuevo."
        );
    }
}

export default crearContactoExtra;
