<?php

require  './conexion.php';

$usuario = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn, "SELECT * FROM login WHERE user ='".$usuario."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);

if ($nr == 1) {
    header("Location: Crud/index.php");
    
}else if($nr == 0){
    echo "No hay ingreso";
}

?>