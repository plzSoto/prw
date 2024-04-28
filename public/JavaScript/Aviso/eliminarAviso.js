async function eliminarAviso(avisoId) {
    try {
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        const response = await fetch(`/aviso/${avisoId}`, {
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

export default eliminarAviso;
