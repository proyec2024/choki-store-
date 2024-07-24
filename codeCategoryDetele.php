<?php

require '../../config/config.php';
require '../../config/conn.php';

$id = $_GET['id'];

$sql = "DELETE FROM categoria WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: ' . RUTA_PRINCIAL . '?pages=category');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}