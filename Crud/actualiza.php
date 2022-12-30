<?php 
require '../login.php';

$id = $conn->real_escape_string($_POST['id']);
$nombre = $conn->real_escape_string($_POST['nombre']);
$director = $conn->real_escape_string($_POST['director']);
$facultad = $conn->real_escape_string($_POST['facultad']);
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$fecha = $conn->real_escape_string($_POST['fecha']);

$sql = "UPDATE proyectos 
SET nombre ='$nombre', director='$director', facultad='$facultad', descripcion='$descripcion', fecha='$fecha' WHERE id=$id";

if ($conn->query($sql)) {
    
}

header('Location: index.php');