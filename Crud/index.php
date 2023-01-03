<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "proyecto";

$conn =  mysqli_connect($dbhost, $dbuser,$dbpass, $dbname);

if(!$conn){
    die("No hay una conexión: ".mysqli_connect_error());
}

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
  <link rel="stylesheet" href="../style.css">
  <body>
    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="navbar navbar-expand-lg sticky-top bg-light" >
        <div class="container-fluid">
          <a class="navbar-brand fs-2" href="#">UTS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../index.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#proyectos">Proyectos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#nosotros">Nosotros</a>
              </li>
            </ul>
              <button class="btn btn-outline-dark" type="submit"><a class="nav-link" href="../login.html">Salir</a></button>
          </div>
        </div>
      </nav>


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

    <!-- PIE DE PÁGINA -->
    <footer class="text-bg-dark pt-3 position-absolute bottom-0 w-100">
  <div class="redes-contaienr d-flex justify-content-center flex-wrap p-4 text-light">
          <a class="px-2" href="https://www.facebook.com/photo/?fbid=430691219216227&set=a.430691199216229"><img src="https://img.icons8.com/color/48/null/facebook-new.png"/></a>
          <a href="https://twitter.com/Unidades_UTS"><img src="https://img.icons8.com/color/48/null/twitter-circled--v1.png"/></a>
          <a class="px-2" href="https://www.instagram.com/unidades_uts/?hl=els-la"><img src="https://img.icons8.com/fluency/48/null/instagram-new.png"/></a>
          <a href="https://co.linkedin.com/school/unidades-tecnol%C3%B3gicas-de-santander/"><img src="https://img.icons8.com/color/48/null/linkedin.png"/></a>
          <a class="px-2" href="https://www.youtube.com/channel/UC-rIi4OnN0R10Wp-cPiLcpQ"><img src="https://img.icons8.com/color/48/null/youtube-play.png"/></a>
  </div> 
</footer>
    <script src="./main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
