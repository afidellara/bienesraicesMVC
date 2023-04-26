<?php

namespace Controllers;

use Intervention\Image\ImageManagerStatic as Image;

use Model\Blog;
use MVC\Router;

class BlogController
{

    public static function index(Router $router)
    {
        $blogs = Blog::all();
        $router->render('/blogs/admin', [
            'blogs' => $blogs
        ]);
    }

    public static function crear(Router $router)
    {
        $errores = Blog::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $blog = new Blog($_POST['blog']);


            $nombreImg = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800, 600);
                $blog->setImage($nombreImg);
            }

            $errores = $blog->validar();
            if (empty($errores)) {
                if (!is_dir(CARPETAS_IMAGENES)) {
                    mkdir(CARPETAS_IMAGENES);
                }

                $image->save(CARPETAS_IMAGENES . $nombreImg);
                $blog->guardar();
            }
        }
        $router->render('/blogs/crear', [
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
 
        $id = redireccionar('/blogs/admin');
        $blog = Blog::find($id);
    
        $errores = Blog::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['blog'];
            $blog->sincronizar($args);
            $errores = $blog->validar();

            $nombreImg = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800, 600);
                $blog->setImage($nombreImg);
            }


            if (empty($errores)) {
                if ($_FILES['blog']['tmp_name']['imagen']) {
                    $image->save(CARPETAS_IMAGENES . $nombreImg);
                }
                $blog->guardar();
            }
        }

        $router->render('/blogs/actualizar', [
            'blog' => $blog,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $resultado = $_GET['resultado'] ?? null;
            if ($id) {
                $blog = Blog::find($id);
                $blog->eliminar();
            }
        }

        $router->render('/blogs/eliminar', [
            'blog' => $blog,
            'resultado' => $resultado
        ]);
    }
}
