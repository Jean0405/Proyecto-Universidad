<!-- Modal -->
<div
  class="modal fade"
  id="editaModal"
  tabindex="-1"
  aria-labelledby="editaModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editaModalLabel">Editar Proyecto</h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form action="actualiza.php" method="post">
        <input type="hidden" id="id" name="id">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input
              type="text"
              class="form-control"
              name="nombre"
              id="nombre"
              placeholder="Nombre"
              required
            />
          </div>

          <div class="mb-3">
            <label for="director" class="form-label">Director</label>
            <input
              type="text"
              class="form-control"
              name="director"
              id="director"
              placeholder="Director"
              required
            />
          </div>

          <div class="mb-3">
            <label for="facultad" class="form-label">Facultad</label>
            <input
              type="text"
              class="form-control"
              name="facultad"
              id="facultad"
              placeholder="Facultad"
              required
            />
          </div>

          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea
              class="form-control"
              name="descripcion"
              id="descripcion"
              rows="6"
              placeholder="Descripcion del proyecto"
              required
            ></textarea>
          </div>

          <div class="form-floating mb-3">
            <input
              type="date"
              class="form-control"
              name="fecha"
              id="fecha"
              placeholder=""
              required
            />
            <label for="fecha">Fecha </label>
          </div>

          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Cerrar
            </button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
