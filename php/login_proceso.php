<?php
declare(strict_types=1);
session_start();

$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);

if (empty($usuario) || empty($password)) {
    header("Location: ../login.php?error=Todos los campos son obligatorios");
    exit();
}

if (isset($_COOKIE['usuario']) && isset($_COOKIE['password'])) {
    if ($usuario === $_COOKIE['usuario'] && $password === $_COOKIE['password']) {
        $_SESSION['usuario'] = $usuario;
        header("Location: ../suerte.php");
        exit();
    } else {
        header("Location: ../login.php?error=Usuario o contraseña incorrectos");
        exit();
    }
} else {
    header("Location: ../login.php?error=No se encontró el usuario. Por favor, regístrate.");
    exit();
}
?>