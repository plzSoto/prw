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

        estadoSelect.innerHTML = '<option value="">Seleccionar Estado</option>';
        animalSelect.innerHTML = '<option value="">Seleccionar Animal</option>';
        contactoExtraSelect.innerHTML =
            '<option value="">Seleccionar Contacto Extra</option>';

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
    } catch (error) {
        console.error("Error al cargar los datos:", error);
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

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

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

        const data = await response.json();
        console.log("Aviso creado exitosamente:", data);
        alert("Aviso creado exitosamente");
    } catch (error) {
        console.error("Error al crear el aviso:", error);
        alert("Error al crear el aviso");
    }
}

document.getElementById("createAviso").addEventListener("click", crearAviso);
