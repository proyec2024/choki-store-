<?php

require '../../config/config.php';
require '../../config/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    if ($_FILES['thumb']['name']) {
        // Manejar la subida de la imagen
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
        move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file);
        $thumb = $target_file;
    } else {
        $thumb = $product['thumb'];
    }

    $sql = "UPDATE producto SET nombre='$nombre', descripcion='$descripcion', categoria='$categoria', marca='$marca', cantidad='$cantidad', precio='$precio', thumb='$thumb' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: ' . RUTA_PRINCIAL . '?pages=product');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}