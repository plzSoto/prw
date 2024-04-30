import cargarDatos from "./cargarDatos.js";
import crearAviso from "./crearAviso.js";
import actualizarAviso from "./actualizarAviso.js";
import eliminarAviso from "./eliminarAviso.js";
import filtroAvisos from "./filtroAvisos.js";

document.addEventListener("DOMContentLoaded", function () {
    cargarDatos();
    const editarAvisoButton = document.querySelector(".editar");
    if (editarAvisoButton) {
        const avisoId = editarAvisoButton.getAttribute("id");
        editarAvisoButton.addEventListener("click", function () {
            actualizarAviso(avisoId);
        });
    }

    const crearAvisoButton = document.getElementById("crearAviso");
    if (crearAvisoButton) {
        crearAvisoButton.addEventListener("click", crearAviso);
    }

    const eliminarAvisoButton = document.querySelectorAll(".eliminar");
    eliminarAvisoButton.forEach((button) => {
        button.addEventListener("click", function () {
            const avisoId = this.id.replace("eliminarAviso", "");
            eliminarAviso(avisoId);
        });
    });

    const estadoFiltro = document.getElementById("estadoFiltro");
    if (estadoFiltro) {
        estadoFiltro.addEventListener("change", filtroAvisos);
    }
});
