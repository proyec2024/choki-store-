<?php

require '../config/conexion.php';
require '../Class/Metodos.php';
require '../config/config.php';

$conn = new BaseDatos();
$metodos = new Metodos($conn->getConectarBD());

if($metodos->insertCompra($_GET['pruducto'], $_GET['cliente']))
{
    header('Location: ' . RUTA_PRINCIAL . '?pages=product&producto='.$_GET['pruducto'].'&exitoCompra');
}
else
{
    header('Location: ' . RUTA_PRINCIAL . '?pages=product&producto='.$_GET['pruducto'].'&errorCompra=Hubo un error al comprar.');
}