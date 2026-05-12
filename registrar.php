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
    <title>Registrar</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <section class="container">
        <div class="titulo">
            <img src="img/cookiesFortune.png" alt="Fortune Cookie" class="fortune-image">
            <h1>Regístrate para saber tu suerte!!!</h1>
        </div>
        
        <form action="php/registrar_proceso.php" method="POST">
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" name="usuario" placeholder="Nombre de Usuario" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password" required>
            
            <label for="confirm_password">Confirmar Password:</label>
            <input type="password" name="confirm_password" placeholder="Confirmar Password" required>

            <button type="submit">Registrar</button>
        </form>

        <div class="registro">
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
        </div>
    </section>
    <?php
        if (isset($_GET['error'])) {
            echo "<p class='error'>".$_GET['error']."</p>";
        }
    ?>
</body>
</html>