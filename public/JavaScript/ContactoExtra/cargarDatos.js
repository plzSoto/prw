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
    }
}

export default cargarDatos;
