<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "proyecto";

$conn =  mysqli_connect($dbhost, $dbuser,$dbpass, $dbname);

if(!$conn){
    die("No hay una conexión: ".mysqli_connect_error());
}
?>