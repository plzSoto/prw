function filtroAnimales() {
    var selectedEspecieId = document.getElementById("especieFiltro").value;
    var animales = document.getElementsByClassName("contenido");
    for (var i = 0; i < animales.length; i++) {
        var especieId = animales[i].getAttribute("dataEspecieId");
        if (selectedEspecieId === "" || especieId === selectedEspecieId) {
            animales[i].style.display = "block";
        } else {
            animales[i].style.display = "none";
        }
    }
}

export default filtroAnimales;
