import cargarDatos from "./cargarDatos.js";
import crearAnimal from "./crearAnimal.js";
import actualizarAnimal from "./actualizarAnimal.js";
import eliminarAnimal from "./eliminarAnimal.js";

document.addEventListener("DOMContentLoaded", function () {
    cargarDatos();
    const editarAnimalButton = document.querySelector(".editar");
    if (editarAnimalButton) {
        const animalId = editarAnimalButton.getAttribute("id");
        editarAnimalButton.addEventListener("click", function () {
            actualizarAnimal(animalId);
        });
    }

    const crearAnimalButton = document.getElementById("crearAnimal");
    if (crearAnimalButton) {
        crearAnimalButton.addEventListener("click", crearAnimal);
    }

    const eliminarAnimalButton = document.querySelectorAll(".eliminar");
    eliminarAnimalButton.forEach((button) => {
        button.addEventListener("click", function () {
            const animalId = this.id.replace("eliminarAnimal", "");
            eliminarAnimal(animalId);
        });
    });
});
