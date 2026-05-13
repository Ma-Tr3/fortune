<?php
declare(strict_types=1);
session_start();

$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);


if (empty($usuario) || empty($password)) {
    header("Location: ../login.php?error=Todos los campos son obligatorios, parece que no tienes suerte hoy :(");
    exit();
}

if (!isset($_COOKIE['usuarios'])) {
    header("Location: ../login.php?error=No hay usuarios registrados, parece que no tienes suerte hoy :(");
    exit();
}


$data_usuarios = unserialize($_COOKIE['usuarios']);

if (!is_array($data_usuarios)) {
    header("Location: ../login.php?error=Error al leer los usuarios, parece que no tienes suerte hoy :(");
    exit();
}

foreach ($data_usuarios as $user) {
    if ($user['usuario'] === $usuario && $user['password'] === $password) {

        $_SESSION['usuario'] = $usuario;

        if (isset($_POST['recordar'])) {
            setcookie("recordar_usuario", $usuario, time() + 86400, "/");
        }

        header("Location: ../suerte.php");
        exit();
    }
}
header("Location: ../login.php?error=Usuario o contraseña incorrectos, parece que no tienes suerte hoy :(");
exit();
?>