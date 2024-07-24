<?php

require '../../config/config.php';
require '../../config/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $sql = "UPDATE categoria SET nombre='$nombre' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: ' . RUTA_PRINCIAL . '?pages=category');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}