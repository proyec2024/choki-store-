<?php

require '../../config/config.php';
require '../../config/conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM marcas WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: ' . RUTA_PRINCIAL . '?pages=marcas');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}