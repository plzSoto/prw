async function eliminarAnimal(animalId) {
    try {
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        const response = await fetch(`/animal/destroy/${animalId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
        });

        if (!response.ok) {
            throw new Error("Error al eliminar el animal");
        }

        const responseData = await response.json();
        console.log("Animal eliminado exitosamente:", responseData);

        location.reload();
    } catch (error) {
        console.error("Error al eliminar el animal:", error.message);
        alert("Error al eliminar el animal. Por favor, inténtalo de nuevo.");
    }
}

export default eliminarAnimal;
