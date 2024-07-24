<?php

require '../config/conexion.php';
require '../Class/Metodos.php';
require '../config/config.php';

$conn = new BaseDatos();
$metodos = new Metodos($conn->getConectarBD());

if($metodos->deleteCarritoCompras($_GET['id']))
{
    header('Location: ' . RUTA_PRINCIAL . '?pages=card');
}
else
{
    header('Location: ' . RUTA_PRINCIAL . '?pages=card&error=Hubo un error.');
}