<?php
require '../config/conexion.php';
require '../Class/Metodos.php';
require '../config/config.php';

// Inicializar la conexión a la base de datos
$conn = new BaseDatos();
$metodos = new Metodos($conn->getConectarBD());

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    if (empty($nombre) || empty($apellido) || empty($email) || empty($password)) {
        header('Location: ' . RUTA_PRINCIAL . '?pages=singup&error=Todos los campos son obligatorios.');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ' . RUTA_PRINCIAL . '?pages=singup&error=Correo electrónico no válido.');
        exit;
    }

    if ($metodos->Registar($nombre, $apellido, $email, $password)) {
        header('Location: ' . RUTA_PRINCIAL . '?pages=login&error=Registro exitoso. Puedes iniciar sesión ahora.');
    } else {
        header('Location: ' . RUTA_PRINCIAL . '?pages=singup&error=Error al registrar el usuario.');

    }

}
?>
