<?php

namespace Controllers;

use Model\Blog;
use MVC\Router;
use Model\Propiedades;
use PHPMailer\PHPMailer\PHPMailer; 

class PaginasController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedades::get(3);
        $blogs = Blog::get(2);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'blogs' => $blogs,
            'inicio' => $inicio
        ]);
    }
 
    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros', []);
    }
 
    public static function propiedades(Router $router)
    {
        $propiedades = Propiedades::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router)
    {
        $id = redireccionar('/');
        $propiedades = Propiedades::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedades
        ]);
    }
    public static function blog(Router $router)
    {
        $router->render('paginas/blog', []);
    }
    public static function entrada(Router $router)
    {
        $id = redireccionar('/'); 
        $blog = Blog::find($id); 
        $router->render('paginas/entrada', [
            'blog'=>$blog
        ]);
    }
    public static function contacto(Router $router)
    {

        $mensaje=null; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuesta = $_POST['contacto'];


            $mail = new PHPMailer();

            //configurar el protocolo SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '599041bc0212ab';
            $mail->Password = '8074dba4a0153a';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //configurar el contenido del email
            $mail->setFrom('admin@correo.com');
            $mail->addAddress('admin@correo.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //habilitar html
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //definir contenido
            $contenido = '<html>';
            $contenido .= '<p>MENSAJE ENVIADO DESDE EL CONTACTO DE BIENES RAICES DE ALEJANDRO LARA</p>';
            $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . '</p>';

            if ($respuesta['contacto'] === 'telefono') {
                $contenido .= '<p>Télefono: ' . $respuesta['telefono'] . '</p>';
                $contenido .= '<p>Fecha: ' . $respuesta['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuesta['hora'] . '</p>';
            } else {
                $contenido .= '<p>Email: ' . $respuesta['email'] . '</p>';
            }
            $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . '</p>';
            $contenido .= '<p>Vende o compra: ' . $respuesta['tipo'] . '</p>';
            $contenido .= '<p>Presupuesto: $' . $respuesta['precio'] . '</p>';
            $contenido .= '<p>Serás contactador por: ' . $respuesta['contacto'] . '</p>';

            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'TEXTO ALTERNATIVO SIN HTML';
            //enviar email
            if ($mail->send()) {
                $mensaje = 'MENSAJE ENVIADO EXITOSAMENTE';
            } else {
                $mensaje = 'EL MENSAJE NO PUDO ENVIARSE';
            }
        }

        $router->render('paginas/contacto', [
            'mensaje'=>$mensaje
        ]);
    }
}
