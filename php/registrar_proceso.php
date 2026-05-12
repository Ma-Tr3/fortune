<?php
    declare(strict_types=1);
    session_start();

    $usuario = trim($_POST['usuario']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($usuario) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: ../registrar.php?error=Todos los campos son obligatorios");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: ../registrar.php?error=Las contraseñas no coinciden");
        exit();
    }

    setcookie("usuario", $usuario, time() + (86400 * 30), "/");
    setcookie("email", $email, time() + (86400 * 30), "/");
    setcookie("password", $password, time() + (86400 * 30), "/");

    header("Location: ../login.php?success=Registro exitoso, por favor inicia sesión");
    exit();
?>