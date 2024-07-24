<?php

require '../../config/config.php';
require '../../config/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO marcas (nombre) VALUES ('$nombre')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ' . RUTA_PRINCIAL . '?pages=marcas');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}