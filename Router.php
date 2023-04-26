<?php 

namespace MVC;

class Router{

    public $rutasGET=[]; 
    public $rutasPOST=[];
    
    public function get($url,$fn){
        $this->rutasGET[$url] = $fn; 
    }

    public function post($url,$fn){
        $this->rutasPOST[$url] = $fn; 
    }
 
   public function comprobarRuta(){

        session_start(); 

        $auth = $_SESSION['login'] ?? null; 

        $rutas_protegidas=['/propiedades/admin', 
        '/propiedades/crear',
        '/propiedades/actualizar',
        '/propiedades/eliminar',
        '/vendedores/admin',
        '/vendedores/crear',
        '/vendedores/actualizar',
        '/vendedores/eliminar',
        '/blogs/admin',
        '/blogs/crear',
        '/blogs/actualizar',
        '/blogs/eliminar']; 

        $urlActual=$_SERVER['PATH_INFO'] ?? '/'; 
        $metodo = $_SERVER['REQUEST_METHOD']; 
 

        if($metodo==='GET'){
           $fn= $this->rutasGET[$urlActual] ?? null; 
        }else{
            $fn= $this->rutasPOST[$urlActual] ?? null; 
        }

        //privatizando rutas
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location: /login');
        }

        if($fn){
            call_user_func($fn,$this); 
        }else{
            echo 'PAGINA NO ENCONTRADA'; 
        }
   }
 

   public static function render($view, $datos = []){

        foreach($datos as $key => $value){
            $$key = $value; 
        }
        ob_start(); 
        include __DIR__ . "/views/$view.php"; 

        $contenido = ob_get_clean(); 

        include __DIR__ . "/views/Layout.php"; 
    }
}