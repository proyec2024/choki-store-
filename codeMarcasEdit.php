<?php

require '../../config/config.php';
require '../../config/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $sql = "UPDATE marcas SET nombre='$nombre' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: ' . RUTA_PRINCIAL . '?pages=marcas');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
