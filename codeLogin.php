<?php
require '../config/conexion.php';
require '../Class/Metodos.php';
require '../config/config.php';

// Inicializar la conexión a la base de datos
$conn = new BaseDatos();
$metodos = new Metodos($conn->getConectarBD());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validación de entrada
    if (empty($email) || empty($password)) {
        header('Location: ' . RUTA_PRINCIAL . '?pages=login&error=Todos los campos son obligatorios.');
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ' . RUTA_PRINCIAL . '?pages=login&error=Correo electrónico no válido.');
        exit();
    } else {
        $datos = $metodos->IniciarSesion($email, $password);
        if ($datos) {
            session_start();
            $usuario = mysqli_fetch_assoc($datos);
            if ($usuario) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['apellido'] = $usuario['apellido'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['rol'] = $usuario['rol'];

                if ($usuario['rol'] == 1) {
                    header('Location: ' . RUTA_PRINCIAL . '?pages=home');
                } else {
                    header('Location: ' . RUTA_PRINCIAL . '?pages=home');
                }
                exit();
            } else {
                header('Location: ' . RUTA_PRINCIAL . '?pages=login&error=Credenciales incorrectas.');
                exit();
            }
        } else {
            header('Location: ' . RUTA_PRINCIAL . '?pages=login&error=No existe una cuenta con ese correo electrónico.');
            exit();
        }
    }
}
