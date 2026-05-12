<?php
    declare(strict_types=1);
    session_start();

    if (isset($_SESSION['usuario'])) {
        header("Location: suerte.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <section class="container">
        <div class="titulo">
            <img src="img/cookiesFortune.png" alt="Fortune Cookie" class="fortune-image">
            <h1>Ingresa para saber tu suerte!!!</h1>
        </div>
        
        <form action="php/login_proceso.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" placeholder="Usuario" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password" required>
            
            <label for="recordar">Recordame:</label>
            <input type="checkbox" name="recordar" id="recordar">
            
            <button type="submit">Login</button>
        </form>

        <div class="registro">
            <p>¿No tienes una cuenta? <a href="registrar.php">Regístrate aquí</a></p>
        </div>
    </section>
    <?php
        if (isset($_GET['error'])) {
            echo "<p class='error'>".$_GET['error']."</p>";
        }
    ?>
</body>
</html>