<?php
include "conexion.php";

mysqli_select_db($conexion, "productosbd");

$productoborrar = $_GET["id"];
$borrar = "DELETE FROM productos WHERE id_producto = '$productoborrar'";
mysqli_query($conexion, $borrar);
header("Location: baja_ok.php");

?>
