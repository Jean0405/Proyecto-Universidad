let paginaActual = 1;
//Invocación de la funcion getData()
getData(paginaActual);
//Escuchar un evento cuando teclean y llamar la funcion getData
document.getElementById("campo").addEventListener(
  "keyup",
  function () {
    getData(1);
  },
  false
);
document.getElementById("num_registros").addEventListener(
  "change",
  function () {
    getData(paginaActual);
  },
  false
);
//Peticion AJAX
function getData(pagina) {
  let input = document.getElementById("campo").value;
  let num_registros = document.getElementById("num_registros").value;
  let content = document.getElementById("content");
  if (pagina != null) {
    paginaActual = pagina;
  }
  let url = "./load.php";
  let formaData = new FormData();
  formaData.append("campo", input);
  formaData.append("registros", num_registros);
  formaData.append("pagina", paginaActual);
  fetch(url, {
    method: "POST",
    body: formaData,
  })
    .then((response) => response.json())
    .then((data) => {
      content.innerHTML = data.data;
      document.getElementById("lbl-total").innerHTML =
        "Mostrando " +
        data.totalFiltro +
        " de " +
        data.totalRegistros +
        " registros";
      document.getElementById("nav-paginacion").innerHTML = data.paginacion;
    })
    .catch((err) => console.log(err));
}
