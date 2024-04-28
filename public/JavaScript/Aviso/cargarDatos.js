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
            const estadoOptions = estadoSelect.querySelectorAll("option");
            const animalOptions = animalSelect.querySelectorAll("option");
            const contactoExtraOptions =
                contactoExtraSelect.querySelectorAll("option");

            if (estadoOptions.length === 0) {
                estadoSelect.innerHTML =
                    '<option value="">Seleccionar Estado</option>';
            }
            if (animalOptions.length === 0) {
                animalSelect.innerHTML =
                    '<option value="">Seleccionar Animal</option>';
            }
            if (contactoExtraOptions.length === 0) {
                contactoExtraSelect.innerHTML =
                    '<option value="">Seleccionar Contacto</option>';
            }

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
                option.textContent = contactoextra.TELEFONO;
                contactoExtraSelect.appendChild(option);
            });
        }
    } catch (error) {
        console.error("Error al cargar los datos:", error.message);
        alert("Error al cargar los datos");
    }
}

export default cargarDatos;
