<?php

$servername = "localhost";
$username = "jhonyeclasespiti_root";
$password = "}b4hG6GLy4KH";
$dbname = "jhonyeclasespiti_choki";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
