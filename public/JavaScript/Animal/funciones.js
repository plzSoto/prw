document.addEventListener("DOMContentLoaded", function () {
    cargarDatos();
});

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

        colorSelect.innerHTML = '<option value="">Seleccionar Color</option>';
        tamañoSelect.innerHTML = '<option value="">Seleccionar Tamaño</option>';
        especieSelect.innerHTML =
            '<option value="">Seleccionar Especie</option>';

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
    } catch (error) {
        console.error("Error al cargar los datos:", error);
        alert("Error al cargar los datos");
    }
}

async function crearAnimal() {
    try {
        const nombre = document.getElementById("nombre").value;
        const descripcion = document.getElementById("descripcion").value;
        const imagen = document.getElementById("imagen").value;
        const colorId = document.getElementById("color_id").value;
        const tamañoId = document.getElementById("tamaño_id").value;
        const especieId = document.getElementById("especie_id").value;

        const animalData = {
            NOMBRE: nombre,
            DESCRIPCION: descripcion,
            IMAGEN: imagen,
            COLOR_ID: colorId,
            TAMAÑO_ID: tamañoId,
            ESPECIE_ID: especieId,
        };

        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        if (!csrfTokenMeta) {
            throw new Error("No se encontró el token CSRF");
        }
        const csrfToken = csrfTokenMeta.getAttribute("content");

        const response = await fetch("/animal/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(animalData),
        });

        if (!response.ok) {
            throw new Error("Error al crear el animal");
        }

        const responseData = await response.json();
        console.log("Animal creado exitosamente:", responseData);

        window.location.href = "animal";

        document.getElementById("formAnimal").reset();
    } catch (error) {
        console.error("Error al crear el animal:", error);
        alert("Error al crear el animal");
    }
}

document.getElementById("createAnimal").addEventListener("click", crearAnimal);
