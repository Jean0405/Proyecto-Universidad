<?php 
require '../conexion.php';

$id = $conn->real_escape_string($_POST["id"]);

$sql = "DELETE FROM proyectos WHERE id=$id;";

if ($conn->query($sql)){
}

header('Location: index.php');
