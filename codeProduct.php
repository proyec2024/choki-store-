<?php

require '../../config/config.php';
require '../../config/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    // Manejar la subida de la imagen
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
    move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file);

    $sql = "INSERT INTO producto (nombre, descripcion, categoria, marca, cantidad, precio, thumb)
            VALUES ('$nombre', '$descripcion', '$categoria', '$marca', '$cantidad', '$precio', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ' . RUTA_PRINCIAL . '?pages=product');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
