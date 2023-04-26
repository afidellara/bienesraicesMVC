<?php

namespace Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use MVC\Router;
use Model\Propiedades;
use Model\Vendedor;
 
class PropiedadController
{
    public static function index(Router $router)
    {

        $propiedades = Propiedades::all();
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router)
    {


        $propiedades = new Propiedades;
        $vendedores = Vendedor::all();

        $errores = Propiedades::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad = new Propiedades($_POST['propiedad']);

            $nombreImg = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImage($nombreImg);
            }

            $errores = $propiedad->validar();

            if (empty($errores)) {
                if (!is_dir(CARPETAS_IMAGENES)) {
                    mkdir(CARPETAS_IMAGENES);
                }
                
                $image->save(CARPETAS_IMAGENES . $nombreImg);

                $propiedad->guardar();
            }
        }


        $router->render('/propiedades/crear', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {

        $id = redireccionar('/propiedades/admin');

        $propiedad = Propiedades::find($id);
        $vendedores = Vendedor::all();

        $errores = Propiedades::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);

            $errores = $propiedad->validar();


            $nombreImg = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImage($nombreImg);
            }

            
            if (empty($errores)) {
               
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image->save(CARPETAS_IMAGENES . $nombreImg);
                }
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $resultado = $_GET['resultado'] ?? null;

            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $propiedades = Propiedades::find($id);
                    $propiedades->eliminar();
                }
            }
        }

        $router->render('/propiedades/eliminar', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }
}
