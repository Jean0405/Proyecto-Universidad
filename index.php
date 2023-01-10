<?php 
require './conexion.php';
$sqlProyectos = "SELECT id, nombre FROM proyectos  WHERE facultad LIKE '%NATURALES E INGENIERIAS' ORDER BY fecha DESC LIMIT 4";
$proyectos = $conn->query($sqlProyectos);


$sqlProyectos2 = "SELECT id, nombre FROM proyectos WHERE facultad LIKE '%SOCIOECONÓMICAS Y EMPRESARIALES' ORDER BY fecha DESC LIMIT 4";
$proyectos2 = $conn->query($sqlProyectos2);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="./style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="navbar navbar-expand-lg sticky-top bg-light">
      <div class="container-fluid">
        <a class="navbar-brand fs-2" href="#">UTS</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link"
                aria-current="page"
                href="./Buscador/buscador.html"
                >Buscar</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#proyectos">Proyectos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#nosotros">Nosotros</a>
            </li>
          </ul>
          <button class="btn btn-outline-dark" type="submit">
            <a class="nav-link" href="login.html">Ingresar</a>
          </button>
        </div>
      </div>
    </nav>

    <!-- BANNER -->
    <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="1"
          aria-label="Slide 2"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="2"
          aria-label="Slide 3"
        ></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="https://www.uts.edu.co/sitio/wp-content/uploads/2022/09/banner-transporte.jpg"
            class="d-block w-100"
            alt="imagen1"
          />
        </div>
        <div class="carousel-item">
          <img
            src="https://www.uts.edu.co/sitio/wp-content/uploads/2022/12/banner-obras-civiles.jpg"
            class="d-block w-100"
            alt="imagen2"
          />
        </div>
        <div class="carousel-item">
          <img
            src="https://th.bing.com/th/id/R.166a9401569b082ce3250640c7629f72?rik=IoIpAGrTfnngOw&riu=http%3a%2f%2fwww.uts.edu.co%2fsitio%2fwp-content%2fuploads%2f2019%2f10%2fbanner-INTERNACIONAL.jpg&ehk=2hKxUcsyzdKBpJf4YDKvjP9RM6dfazqyJWIPDJoJsuA%3d&risl=&pid=ImgRaw&r=0"
            class="d-block w-100"
            alt="imagen3"
          />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- SECCIÓN DE PROYECTOS -->
    <div class="section-proyectos m-4 p-2" id="proyectos">
      <h2>FACULTAD DE CIENCIAS NATURALES E INGENIERÍAS</h2>
      <div
        class="proyects-container w-100 d-flex justify-content-around bg-light row"
      >
      <?php while ($row_proyecto = $proyectos->fetch_assoc()) {?>
        <ul class="list-group col">
          <li><?= $row_proyecto['nombre']; ?></li></a>
        </ul>
        <?php }?>
      </div>
    </div>
    <div class="section-proyectos m-4 p-2">
      <h2>FACULTAD DE CIENCIAS SOCIOECONÓMICAS Y EMPRESARIALES</h2>
      <div
        class="proyects-container w-100 d-flex justify-content-around bg-light row"
      >
        <?php while ($row_proyecto = $proyectos2->fetch_assoc()) {?>
        <ul class="list-group col">
          <li><?= $row_proyecto['nombre']; ?></li></a>
        </ul>
        <?php }?>
      </div>
    </div>


    <!-- CAMPUS UNIVERSITARIO -->
    <div
      class="campus-container d-flex flex-wrap justify-content-around m-4"
      id="nosotros"
    >
      <div class="card border-dark mb-3" style="max-width: 18rem">
        <div class="card-header text-bg-dark fw-bold font-monospace">
          Bucaramanga
        </div>
        <div class="card-body text-dark">
          <h5 class="card-title">
            Calle de los Estudiantes #9-82 Ciudadela Real de Minas
          </h5>
          <p class="card-text">
            La ciudad de los parques (72) o ciudad bonita de Colombia es
            considerada la 4ta más importante del país.
          </p>
        </div>
        <div class="card-footer bg-transparent border-dark">
          <a class="list-group-item fst-italic" href="">Ubicación</a>
        </div>
      </div>

      <div class="card border-dark mb-3" style="max-width: 18rem">
        <div class="card-header text-bg-dark fw-bold font-monospace">
          Barrancabermeja
        </div>
        <div class="card-body text-dark">
          <h5 class="card-title">
            Colegio Diego Hernández de Gallegos Calle 60 No. 28-68
          </h5>
          <p class="card-text">
            Considerada la ciudad petrolera de Colombia y a orillas del río
            Magdalena.
          </p>
        </div>
        <div class="card-footer bg-transparent border-dark">
          <a class="list-group-item fst-italic" href="">Ubicación</a>
        </div>
      </div>

      <div class="card border-dark mb-3" style="max-width: 18rem">
        <div class="card-header text-bg-dark fw-bold font-monospace">Vélez</div>
        <div class="card-body text-dark">
          <h5 class="card-title">Calle 12 # 5 -33 barrio La esperanza</h5>
          <p class="card-text">
            Caracterizada cómo la capital foclórica de Colombia, dueña del
            bocadillo Veleño y gente muy amable con los turistas.
          </p>
        </div>
        <div class="card-footer bg-transparent border-dark">
          <a class="list-group-item fst-italic" href="">Ubicación</a>
        </div>
      </div>

      <div class="card border-dark mb-3" style="max-width: 18rem">
        <div class="card-header text-bg-dark fw-bold font-monospace">
          Piedecuesta
        </div>
        <div class="card-body text-dark">
          <h5 class="card-title">Kilómetro 2 vía Guatiguará</h5>
          <p class="card-text">
            Perteneciente al área metropolitana de B/manga, siendo el principal
            productor de agua con sus ríos y su economia basada en la
            agricultura.
          </p>
        </div>
        <div class="card-footer bg-transparent border-dark">
          <a class="list-group-item fst-italic" href="">Ubicación</a>
        </div>
      </div>
    </div>
    <!-- PIE DE PÁGINA -->
    <footer class="text-bg-dark pt-3">
      <div
        class="redes-contaienr d-flex justify-content-center flex-wrap p-4 text-light"
      >
        <h3 class="w-100 text-center b text-bg-light p-2">
          Siguenos en nuestras redes sociales
        </h3>
        <a
          class="px-2"
          href="https://www.facebook.com/photo/?fbid=430691219216227&set=a.430691199216229"
          ><img src="https://img.icons8.com/color/48/null/facebook-new.png"
        /></a>
        <a href="https://twitter.com/Unidades_UTS"
          ><img
            src="https://img.icons8.com/color/48/null/twitter-circled--v1.png"
        /></a>
        <a class="px-2" href="https://www.instagram.com/unidades_uts/?hl=els-la"
          ><img src="https://img.icons8.com/fluency/48/null/instagram-new.png"
        /></a>
        <a
          href="https://co.linkedin.com/school/unidades-tecnol%C3%B3gicas-de-santander/"
          ><img src="https://img.icons8.com/color/48/null/linkedin.png"
        /></a>
        <a
          class="px-2"
          href="https://www.youtube.com/channel/UC-rIi4OnN0R10Wp-cPiLcpQ"
          ><img src="https://img.icons8.com/color/48/null/youtube-play.png"
        /></a>
      </div>
      <div class="d-flex flex-wrap w-100 justify-content-around pb-3">
        <div class="d-flex flex-column align-items-left">
          <span class="p-1">Email: peticiones@correo.uts.edu.co</span>
          <span class="p-1"
            >Horario de Atención: Lun-Vie: de 8:00 am a 12:00 m y 2:00 pm a 6:00
            pm</span
          >
          <span class="p-1"
            >Correo físico: Calle de los Estudiantes #9-82 Ciudadela Real de
            Minas-Bucaramanga-Santander</span
          >
        </div>
        <div class="d-flex flex-column pt-3">
          <button class="fw-bolder fs-1 btn btn-outline-dark">
            <a
              href="https://www.uts.edu.co/sitio/"
              class="text-decoration-none text-light"
              >UTS</a
            >
          </button>
        </div>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
