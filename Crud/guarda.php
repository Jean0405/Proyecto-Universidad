<?php 
require '../conexion.php';

$nombre = $conn->real_escape_string($_POST['nombre']);
$director = $conn->real_escape_string($_POST['director']);
$facultad = $conn->real_escape_string($_POST['facultad']);
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$fecha = $conn->real_escape_string($_POST['fecha']);

$sql = "INSERT INTO proyectos (nombre, director, facultad, descripcion, fecha) 
VALUES ('$nombre', '$director', '$facultad', '$descripcion', '$fecha')";
if ($conn->query($sql)) {
    $id = $conn->insert_id;
}

header('Location: index.php');