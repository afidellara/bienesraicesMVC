<?php

    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bienes Raices</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/bienesRaices11Ene2023/build/css/app.css" />
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesRaices11Ene2023/index.php">
                    <img src="/bienesRaices11Ene2023/build/img/logo.svg" alt="Logo de bienes raices" />
                </a>

                <div class="mobile-menu">
                    <img src="/bienesRaices11Ene2023/build/img/barras.svg" alt="Icono menu">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienesRaices11Ene2023/build/img/dark-mode.svg" alt="Modo oscuro">
                    <nav class="navegacion">
                        <a href="/bienesRaices11Ene2023/nosotros.php">Nosotros</a>
                        <a href="/bienesRaices11Ene2023/anuncios.php">Anuncios</a>
                        <a href="/bienesRaices11Ene2023/blog.php">Blog</a>
                        <a href="/bienesRaices11Ene2023/contacto.php">Contacto</a>
                        <?php if($auth){ ?>
                            <a href="/bienesRaices11Ene2023/cerrarSesion.php">Cerrar Sesión</a>
                        <?php }?>
                        <?php if(!$auth){ ?>
                            <a href="/bienesRaices11Ene2023/login.php">Iniciar Sesión</a>
                        <?php }?>

                    </nav>
                </div>

            </div>
            <?php if ($inicio) { ?>
                <h1>Venta de casas y departamentos exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>