<?php
    declare(strict_types=1);
    session_start();
    
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
        exit();
    }
    
    require 'php/fortune_proceso.php';

    $fortune = $suerte[array_rand($suerte)] ?? "No se encontró tu suerte. Por favor, inicia sesión o regístrate.";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Galleta de la Suerte dice:</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <section class="container">
        <div class="titulo">
            <img src="img/cookiesFortune.png" alt="Fortune Cookie" class="fortune-image">
            <h1>Tu suerte es...</h1>
        </div>
        
        <div class="suerte">
            <?php
                echo "<p class='suerte-text'>$fortune</p>";
            ?>
        </div>

        <div class="logout">
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    </section>
</body>
</html>