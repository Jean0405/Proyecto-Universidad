<?php

require '../conexion.php';

$id = $conn->real_escape_string($_POST['id']);

$sql = "SELECT id, nombre, director, facultad, descripcion, fecha FROM proyectos WHERE id=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$proyecto = [];

if ($rows > 0) {
    $proyecto = $resultado->fetch_array();
}

echo json_encode($proyecto, JSON_UNESCAPED_UNICODE);