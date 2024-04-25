document.addEventListener("DOMContentLoaded", function () {
    cargarDatos();
});

async function cargarDatos() {
    try {
        const response = await fetch("/loadDataAviso", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) {
            throw new Error("Error al cargar los datos");
        }

        const responseData = await response.json();
        console.log("Datos recibidos:", responseData);

        const estadoSelect = document.getElementById("estado_id");
        const animalSelect = document.getElementById("animal_id");
        const contactoExtraSelect = document.getElementById("contactoextra_id");

        if (estadoSelect && animalSelect && contactoExtraSelect) {
            estadoSelect.innerHTML =
                '<option value="">Seleccionar estado</option>';
            animalSelect.innerHTML =
                '<option value="">Seleccionar animal</option>';
            contactoExtraSelect.innerHTML =
                '<option value="">Seleccionar contacto extra</option>';

            responseData.estado.forEach((estado) => {
                const option = document.createElement("option");
                option.value = estado.ID;
                option.textContent = estado.ESTADO;
                estadoSelect.appendChild(option);
            });

            responseData.animal.forEach((animal) => {
                const option = document.createElement("option");
                option.value = animal.ID;
                option.textContent = animal.NOMBRE;
                animalSelect.appendChild(option);
            });

            responseData.contactoextra.forEach((contactoextra) => {
                const option = document.createElement("option");
                option.value = contactoextra.ID;
                option.textContent = contactoextra.NOMBRE;
                contactoExtraSelect.appendChild(option);
            });
        }
    } catch (error) {
        console.error("Error al cargar los datos:", error.message);
        alert("Error al cargar los datos");
    }
}

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

        // Vuelve a cargar los datos después de crear el aviso
        await cargarDatos();

        // Redirige a la página de avisos
        window.location.href = "aviso";

        document.getElementById("formAviso").reset();
    } catch (error) {
        console.error("Error al crear el aviso:", error);
        alert("Error al crear el aviso");
    }
}

document.getElementById("createAviso").addEventListener("click", crearAviso);

async function eliminarAviso(avisoId) {
    try {
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        const response = await fetch(`/aviso/destroy/${avisoId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
        });

        if (!response.ok) {
            throw new Error("Error al eliminar el aviso");
        }

        const responseData = await response.json();
        console.log("Aviso eliminado exitosamente:", responseData);

        location.reload();
    } catch (error) {
        console.error("Error al eliminar el aviso:", error.message);
        alert("Error al eliminar el aviso. Por favor, inténtalo de nuevo.");
    }
}

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

        // Redirigir a la página de avisos después de la actualización
        window.location.href = "/aviso";
    } catch (error) {
        console.error("Error al actualizar el aviso:", error.message);
        alert("Error al actualizar el aviso. Por favor, inténtalo de nuevo.");
    }
}

function editAviso(avisoId) {
    window.location.href = `editAviso?id=${avisoId}`;
}
