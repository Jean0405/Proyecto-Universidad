<?php
//Lammado de la conexión a mysql

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "proyecto";

$conn =  mysqli_connect($dbhost, $dbuser,$dbpass, $dbname);

if(!$conn){
    die("No hay una conexión: ".mysqli_connect_error());
}

//Columnas de la tabla del mysql
$columns = ['id', 'nombre', 'director', 'facultad', 'descripcion', 'fecha'];

//Por como queremos que filtre el serch
$columsWhere = ['nombre', 'director', 'facultad'];

//Nombre de la tabla
$table = "proyectos";

/* La clave principal de la tabla. */
$id = 'id';

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;


//Filtrado del serch
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columsWhere);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columsWhere[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

//Limite de busqueda
$limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";

//Consulta sql
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sLimit";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

//Consulta para total de registro filtrados
$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

$sqlTotal = "SELECT count($id) FROM $table ";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

//Mostrado resultados
$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        $output['data'] .= '<td>'.$row['id'].'</td>';
        $output['data'] .= '<td>'.$row['nombre'].'</td>';
        $output['data'] .= '<td>'.$row['director'].'</td>';
        $output['data'] .= '<td>'.$row['facultad'].'</td>';
        $output['data'] .= '<td>'.$row['descripcion'].'</td>';
        $output['data'] .= '<td>'.$row['fecha'].'</td>';
        $output['data'] .= '</tr>';
    }
} else {
    $output['data'] .= '<tr>';
    $output['data'] .= '<td colspan="6">Sin resultados</td>';
    $output['data'] .= '</tr>';
}

if ($output['totalRegistros'] > 0) {
    $totalPaginas = ceil($output['totalRegistros'] / $limit);

    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class="pagination">';

    $numeroInicio = 1;

    if(($pagina - 4) > 1){
        $numeroInicio = $pagina - 4;
    }

    $numeroFin = $numeroInicio + 9;

    if($numeroFin > $totalPaginas){
        $numeroFin = $totalPaginas;
    }

    for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
        if ($pagina == $i) {
            $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="getData(' . $i . ')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);