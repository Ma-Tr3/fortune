<?php
    declare(strict_types=1);
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
        exit();
    }
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
            <h1>Bienvenido, Invitado!</h1>
        </div>
        <div>
            <p>Elige tu suerte y disfruta de tu día. Recuerda que la fortuna favorece a los valientes.</p>
        </div>
        <a href="fortune.php">Ver mi suerte</a>

    </section>
    
</body>
</html>