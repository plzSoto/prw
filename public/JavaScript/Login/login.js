document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("loginForm")
        .addEventListener("submit", function (event) {
            event.preventDefault();

            var nombre = document.getElementById("nombre").value;
            var password = document.getElementById("password").value;

            var formData = new FormData();
            formData.append("nombre", nombre);
            formData.append("password", password);

            fetch(verificarUsuario, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Error al iniciar sesión");
                    }
                    return response.json();
                })
                .then((data) => {
                    window.location.href =
                        "{{ route('aviso') }}" + "?token=" + data.token;
                })
                .catch((error) => {
                    document.getElementById("mensajeError").innerText =
                        error.message;
                });
        });
});
