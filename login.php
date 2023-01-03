<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "proyecto";

$conn =  mysqli_connect($dbhost, $dbuser,$dbpass, $dbname);

if(!$conn){
    die("No hay una conexión: ".mysqli_connect_error());
}


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