<?php include "conexion.php"?>

<?php

    mysqli_select_db($conexion, "productosbd");

    //var_dump($_POST);

    $identificador = $_POST["identificador"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];

    //var_dump($_FILES['imagen']);

    $directorioSubida = "imagenes/";
    $max_file_size="5120000";
    $extensionesValidas = array("jpg", "png", "gif", "jpeg");

    if(isset($_FILES['imagen'])){
        $error = 0;
        $nombreArchivo = $_FILES['imagen']['name'];
        $filesize = $_FILES['imagen']['size'];
        $directorioTemp = $_FILES['imagen']['tmp_name'];
        $tipoArchivo = $_FILES['imagen']['type'];
        $arrayArchivo = pathinfo($nombreArchivo);
        //var_dump($arrayArchivo);
        $extension = $arrayArchivo['extension'];

        if(!in_array($extension, $extensionesValidas)){
            echo "La extensión no es válida";
            $errores = 1;
        }

        if($filesize > $max_file_size){
            echo "La imagen debe de tener un tamaño inferior";
        }

        if($error == 0){
            $nombreCompleto = $directorioSubida.$nombreArchivo;
            move_uploaded_file($directorioTemp, $nombreCompleto);
        }
    }

    $insertar = "INSERT productos (id_producto, nombre, descripcion, precio, fotografia) VALUES ($identificador, '$nombre', '$descripcion', $precio, '$nombreArchivo')";

    mysqli_query($conexion, $insertar);

    header("Location:alta_ok.php")

?>