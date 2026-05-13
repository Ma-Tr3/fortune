<?php
    declare(strict_types=1);
    session_start();

    $usuario = trim($_POST['usuario']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($usuario) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: ../registrar.php?error=Todos los campos son obligatorios, parece que no tienes suerte hoy :(");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: ../registrar.php?error=Las contraseñas no coinciden, parece que no tienes suerte hoy :(");
        exit();
    }

    $data_usuarios = array();

    if(isset($_COOKIE['usuarios'])){
        $data_usuarios = unserialize($_COOKIE['usuarios']);
        if(!is_array($data_usuarios)){
            $data_usuarios = array();
        }
    }

    foreach ($data_usuarios as $user) {
        if ($user['email'] === $email) {
            header("Location: ../registrar.php?error=El email ya está registrado, parece que no tienes suerte hoy :(");
            exit();
        }
        if ($user['usuario'] === $usuario) {
            header("Location: ../registrar.php?error=El nombre de usuario ya está registrado, parece que no tienes suerte hoy :(");
            exit();
        }
    }

    $data_usuarios[] = array(
        "usuario" => $usuario,
        "email" => $email,
        "password" => $password
    );

    setcookie("usuarios", serialize($data_usuarios), time() + (86400 * 30), "/");

    header("Location: ../login.php?success=1");
    exit();
?>