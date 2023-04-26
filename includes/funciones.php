<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETAS_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/img/');

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/${nombre}.php";
}

function autenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /bienesRaices11Ene2023/index.php');
    }
}

function ver($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

//escapar html
function sanitizar($campo): string
{
    $sanitizado = htmlspecialchars($campo);
    return $sanitizado;
}


function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

function mostrarNotificacion($resultado)
{
    $mensaje = '';

    switch ($resultado) {
        case 1:
            $mensaje = 'Registro exitoso!!!';
            break;
        case 2:
            $mensaje = 'Cambios guardados exitosamente!!!';
            break;
        case 3:
            $mensaje = 'Registro eliminado!!!';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

function redireccionar(string $url)
{
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("location: ${url}");
    }

    return $id; 
}
