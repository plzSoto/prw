async function cargarDatos() {
    try {
        const response = await fetch("/loadDataAnimal", {
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

        const colorSelect = document.getElementById("color_id");
        const tamañoSelect = document.getElementById("tamaño_id");
        const especieSelect = document.getElementById("especie_id");

        if (colorSelect && tamañoSelect && especieSelect) {
            const colorOptions = colorSelect.querySelectorAll("option");
            const tamañoOptions = tamañoSelect.querySelectorAll("option");
            const especieOptions = especieSelect.querySelectorAll("option");

            if (colorOptions.length === 0) {
                colorSelect.innerHTML =
                    '<option value="">Seleccionar Color</option>';
            }
            if (tamañoOptions.length === 0) {
                tamañoSelect.innerHTML =
                    '<option value="">Seleccionar Tamaño</option>';
            }
            if (especieOptions.length === 0) {
                especieSelect.innerHTML =
                    '<option value="">Seleccionar Especie</option>';
            }

            responseData.color.forEach((color) => {
                const option = document.createElement("option");
                option.value = color.ID;
                option.textContent = color.COLOR;
                colorSelect.appendChild(option);
            });

            responseData.tamaño.forEach((tamaño) => {
                const option = document.createElement("option");
                option.value = tamaño.ID;
                option.textContent = tamaño.TAMAÑO;
                tamañoSelect.appendChild(option);
            });

            responseData.especie.forEach((especie) => {
                const option = document.createElement("option");
                option.value = especie.ID;
                option.textContent = especie.ESPECIE;
                especieSelect.appendChild(option);
            });
        }
    } catch (error) {
        console.error("Error al cargar los datos:", error.message);
        alert("Error al cargar los datos");
    }
}

export default cargarDatos;
