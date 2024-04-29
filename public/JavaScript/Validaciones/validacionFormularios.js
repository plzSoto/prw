function limpiarMensajesError(campos) {
    campos.forEach((campo) => {
        campo.classList.remove("error");
        const mensajeError = campo.nextSibling;
        if (mensajeError && mensajeError.classList.contains("error-message")) {
            mensajeError.remove();
        }
    });
}

function validarCamposVacios(campos) {
    let camposVacios = false;
    campos.forEach((campo) => {
        if (campo.value.trim() === "") {
            campo.classList.add("error");
            const mensajeError = document.createElement("p");
            mensajeError.classList.add("error-message");
            mensajeError.textContent = "Completa este campo";
            campo.parentNode.insertBefore(mensajeError, campo.nextSibling);
            camposVacios = true;
        }
    });
    return camposVacios;
}

export { limpiarMensajesError, validarCamposVacios };
