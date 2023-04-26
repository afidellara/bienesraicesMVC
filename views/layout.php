<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bienes Raices</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../build/css/app.css" />
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logo de bienes raices" />
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menu">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Modo oscuro">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blogs/admin">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth) { ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php } ?>
                        <?php if (!$auth) { ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php } ?>
                        <?php if ($auth) { ?>
                            <a href="/propiedades/admin">Administracion</a>
                        <?php } ?>

                    </nav>
                </div>

            </div>
            <?php if ($inicio) { ?>
                <h1>Venta de casas y departamentos exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>

    <?php echo $contenido;  ?>


    <footer class="footer seccion">
        <div class="contenedor contenido-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedaes">Anuncios</a>
                <a href="/blogs/admin">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <?php
        $fecha = date('Y');
        ?>
        <p class="copyright">Derecheos reservados <?php echo $fecha ?> &copy;</p>
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>

</html>