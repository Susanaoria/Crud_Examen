<?php
session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'inventario';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('Error al conectar con la base de datos: ' . mysqli_connect_error());
}
?>
