<?php

require '../config/conexion.php';
require '../Class/Metodos.php';
require '../config/config.php';

$conn = new BaseDatos();
$metodos = new Metodos($conn->getConectarBD());

if($metodos->insertCarritoCompras($_POST['producto_id'], $_POST['quantity']))
{
    header('Location: ' . RUTA_PRINCIAL . '?pages=product&producto='.$_POST['producto_id'].'&exito');
}
else
{
    header('Location: ' . RUTA_PRINCIAL . '?pages=product&producto='.$_POST['producto_id'].'&error=Hubo un error.');
}