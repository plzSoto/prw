function filtroAvisos() {
    var selectedEstadoId = document.getElementById("estadoFiltro").value;
    var avisos = document.getElementsByClassName("contenido");
    for (var i = 0; i < avisos.length; i++) {
        var estadoId = avisos[i].getAttribute("dataEstadoId");
        if (selectedEstadoId === "" || estadoId === selectedEstadoId) {
            avisos[i].style.display = "block";
        } else {
            avisos[i].style.display = "none";
        }
    }
}

export default filtroAvisos;
