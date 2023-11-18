<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$conexion = mysqli_connect($servidor, $usuario, $password) or die("Error de conexión");

$sql1 = "CREATE DATABASE productosbd";
mysqli_query($conexion, $sql1);

mysqli_select_db($conexion, "productosbd");

$sql2 = "CREATE TABLE productos (id_producto INT (11) NOT NULL, nombre VARCHAR(20), descripcion VARCHAR(255), precio INT(11), fotografia BLOB, PRIMARY KEY (id_producto))";

mysqli_query($conexion, $sql2);

?>