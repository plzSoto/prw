import crearContactoExtra from "./crearContactoExtra.js";
import actualizarContactoExtra from "./actualizarContactoExtra.js";
import eliminarContactoExtra from "./eliminarContactoExtra.js";

document.addEventListener("DOMContentLoaded", function () {
    const editarContactoExtraButton = document.querySelector(".editar");
    if (editarContactoExtraButton) {
        const avisoId = editarContactoExtraButton.getAttribute("id");
        editarContactoExtraButton.addEventListener("click", function () {
            actualizarContactoExtra(avisoId);
        });
    }

    const crearContactoExtraButton =
        document.getElementById("crearContactoExtra");
    if (crearContactoExtraButton) {
        crearContactoExtraButton.addEventListener("click", crearContactoExtra);
    }

    const eliminarContactoExtraButton = document.querySelectorAll(".eliminar");
    eliminarContactoExtraButton.forEach((button) => {
        button.addEventListener("click", function () {
            const avisoId = this.id.replace("eliminarContactoExtra", "");
            eliminarContactoExtra(avisoId);
        });
    });
});
