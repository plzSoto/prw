async function eliminarContactoExtra(contactoextraId) {
    try {
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        const response = await fetch(`/contactoExtra/${contactoextraId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
        });

        if (!response.ok) {
            throw new Error("Error al eliminar el contacto extra");
        }

        const responseData = await response.json();
        console.log("Contacto extra eliminado exitosamente:", responseData);

        location.reload();
    } catch (error) {
        console.error("Error al eliminar el contacto extra:", error.message);
        alert(
            "Error al eliminar el contacto extra. Por favor, inténtalo de nuevo."
        );
    }
}

export default eliminarContactoExtra;
