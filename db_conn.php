<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdname = "cbl_bd";


$conn = mysqli_connect($server, $username, $password, $bdname);
if (!$conn) {
    die("Conexion fallida " . mysqli_connect_error());
}
echo "Conectado";

?>