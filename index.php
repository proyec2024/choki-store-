<?php
session_start();
require 'config/conexion.php';
require 'Class/Metodos.php';
require 'config/config.php';

$conn = new BaseDatos();
$metodos = new Metodos($conn->getConectarBD());

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['pages'])) {

        switch ($_GET['pages']) {
            case 'home':
                if (isset($_SESSION['rol']) and $_SESSION['rol'] == 1) {
                    include 'Admin/inc/HeaderAdmin.php';
                    include 'Admin/admin.php';
                } else {
                    require 'inc/Header.php';
                    include 'pages/Home.php';
                }
                break;

            case 'Logout':
                include 'Actions/Logout.php';
                break;

            case 'card':
                require 'inc/Header.php';
                include 'pages/card.php';
                break;

            case 'compras':
                require 'inc/Header.php';
                include 'pages/Compras.php';
                break;

            case 'singup':
                include 'Auth/Singup.php';
                break;

            case 'login':
                include 'Auth/Login.php';
                break;

            case 'category':
                if (isset($_SESSION['rol']) and $_SESSION['rol'] == 1) {
                    include 'config/conn.php';
                    include 'Admin/inc/HeaderAdmin.php';
                    include 'Admin/pages/categoria.php';
                } else {
                    include 'Auth/Login.php';
                }
                break;

            case 'users':
                if (isset($_SESSION['rol']) and $_SESSION['rol'] == 1) {
                    include 'config/conn.php';
                    include 'Admin/inc/HeaderAdmin.php';
                    include 'Admin/pages/users.php';
                } else {
                    include 'Auth/Login.php';
                }
                break;

            case 'marcas':
                if (isset($_SESSION['rol']) and $_SESSION['rol'] == 1) {
                    include 'config/conn.php';
                    include 'Admin/inc/HeaderAdmin.php';
                    include 'Admin/pages/marcas.php';
                } else {
                    include 'Auth/Login.php';
                }
                break;
    
            case 'product':
                if (isset($_SESSION['rol']) and $_SESSION['rol'] == 1) {
                    $result = $metodos->obtenerProductos();
                    include 'config/conn.php';
                    include 'Admin/inc/HeaderAdmin.php';
                    include 'Admin/pages/product.php';
                } else {
                    require 'inc/Header.php';
                    include 'pages/Product.php';
                }
                break;

            default:
                require 'inc/Header.php';
                include 'pages/404.php';
                break;
        }
    } else {
        header('Location: ' . RUTA_PRINCIAL . '?pages=home');
        exit;
    }

    require 'inc/Footer.php';
} else {
    header('Location: ' . RUTA_PRINCIAL . '?pages=home');
    exit;
}
