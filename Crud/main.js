let editaModal = document.getElementById("editaModal");
let eliminaModal = document.getElementById("eliminaModal");

editaModal.addEventListener("shown.bs.modal", (event) => {
  let button = event.relatedTarget;
  let id = button.getAttribute("data-bs-id");

  let inputId = editaModal.querySelector(".modal-body #id");
  let inputNombre = editaModal.querySelector(".modal-body #nombre");
  let inputDirector = editaModal.querySelector(".modal-body #director");
  let inputFacultad = editaModal.querySelector(".modal-body #facultad");
  let inputDescripcion = editaModal.querySelector(".modal-body #descripcion");
  let inputFecha = editaModal.querySelector(".modal-body #fecha");

  let url = "./getProyecto.php";
  let formData = new FormData();
  formData.append("id", id);

  fetch(url, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      inputId.value = data.id;
      inputNombre.value = data.nombre;
      inputDirector.value = data.director;
      inputFacultad.value = data.facultad;
      inputDescripcion.value = data.descripcion;
      inputFecha.value = data.fecha;
    })
    .catch((err) => console.log(err));
});

eliminaModal.addEventListener("shown.bs.modal", (event) => {
  let button = event.relatedTarget;
  let id = button.getAttribute("data-bs-id");
  eliminaModal.querySelector(".modal-footer #id").value = id;
});
