<?php
require '../login.php';

$sqlProyectos = "SELECT id, nombre, director, facultad, descripcion, fecha FROM proyectos";
$proyectos = $conn->query($sqlProyectos);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Crud</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container py-3">
      <h2 class="text-center">Crud</h2>
     
      <div class="col-auto">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal">Nuevo Proyecto</a>
      </div>
    </div>
  <div class="p-2">
    <table class="table table-info table-hover mt-2">
      <thead class="table-dark">
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Director</th>
          <th scope="col">Facultad</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Fecha</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>

      <tbody class="table-group-divider">
        <?php while ($row_proyecto = $proyectos->fetch_assoc()) { ?>
          <tr>
            <td><?= $row_proyecto['id']; ?></td>
            <td><?= $row_proyecto['nombre']; ?></td>
            <td><?= $row_proyecto['director']; ?></td>
            <td><?= $row_proyecto['facultad']; ?></td>
            <td><?= $row_proyecto['descripcion']; ?></td>
            <td><?= $row_proyecto['fecha']; ?></td>
            <td>
              <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row_proyecto['id'] ?>">Editar</a>
            </td>
            <td>
              <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?= $row_proyecto['id'] ?>">Eliminar</a>
            </td>
        </tr>
         <?php } ?>
      </tbody>
    </table>
    </div>
  <?php	
  include './nuevoModal.php';
  include './editarModal.php';
  include './eliminaModal.php';
  ?>
    <script src="./main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
