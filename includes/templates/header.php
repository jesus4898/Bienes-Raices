<?php 


    if(!isset($_SESSION)) {
        session_start();
    }

//var_dump($_SESSION);

    $auth = $_SESSION['login'] ?? false;

    //var_dump($auth);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo isset( $inicio ) ? 'inicio' : '' ?>"> 
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img class="logo-header"src="/img/logo.svg" alt="logo">   
                </a>

                <div class="mobile-menu">
                    <img src="/img/barras.svg" alt="icono menu responsive">

                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/img/dark-mode.svg" alt="logo">
                    <nav class="navegacion">    
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div> <!--Narra-->

            <?php
                if($inicio) {
                    echo "<h1>Venta de Casas y Departamentos de Lujo</h1>";
                } 

                //otra forma
                // echo $inicio ? "h1 ventas de casas h1" : '';
            

            ?>

        </div>
    </header>
