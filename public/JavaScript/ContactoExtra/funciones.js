async function cargarDatos() {
    try {
        const response = await fetch("/contactoExtra", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) {
            throw new Error("Error al cargar los datos de contacto extra");
        }

        const responseData = await response.json();
        console.log("Datos de contacto extra recibidos:", responseData);

        const contactoExtraSelect = document.getElementById("contactoextra_id");
        if (contactoExtraSelect) {
            contactoExtraSelect.innerHTML =
                '<option value="">Seleccionar Contacto Extra</option>';

            responseData.forEach((contactoExtra) => {
                const option = document.createElement("option");
                option.value = contactoExtra.ID;
                option.textContent = contactoExtra.NOMBRE;
                contactoExtraSelect.appendChild(option);
            });
        }
    } catch (error) {
        console.error(
            "Error al cargar los datos de contacto extra:",
            error.message
        );
        alert("Error al cargar los datos de contacto extra");
    }
}

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

        await cargarDatos();

        window.location.href = "contactoExtra";

        document.getElementById("formContactoExtra").reset();
    } catch (error) {
        console.error("Error al crear el contacto extra:", error);
        alert(
            "Error al crear el contacto extra. Por favor, inténtalo de nuevo."
        );
    }
}

document
    .getElementById("createContactoExtra")
    .addEventListener("click", crearContactoExtra);

async function eliminarContactoExtra(contactoextraId) {
    try {
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        const response = await fetch(`/contactoExtra/${contactoextraId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
        });

        if (!response.ok) {
            throw new Error("Error al eliminar el contacto extra");
        }

        const responseData = await response.json();
        console.log("Contacto extra eliminado exitosamente:", responseData);

        location.reload();
    } catch (error) {
        console.error("Error al eliminar el contacto extra:", error.message);
        alert(
            "Error al eliminar el contacto extra. Por favor, inténtalo de nuevo."
        );
    }
}

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

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

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

        alert("Contacto extra actualizado correctamente");

        window.location.href = "/contactoExtra";
    } catch (error) {
        console.error("Error al actualizar el contacto extra:", error.message);
        alert(
            "Error al actualizar el contacto extra. Por favor, inténtalo de nuevo."
        );
    }
}

function editContactoExtra(contactoextraId) {
    window.location.href = `editContactoExtra?id=${contactoextraId}`;
}
