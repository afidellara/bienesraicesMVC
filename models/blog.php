<?php 

namespace Model;

class Blog extends ActiveRecord{
    protected static $tabla = 'blogs'; 
    protected static $columnasBD = ['id', 'titulo', 'nombre_autor','apellido_autor','fecha','imagen','descripcion'];
    
    public $id; 
    public $titulo; 
    public $nombre_autor; 
    public $apellido_autor; 
    public $fecha; 
    public $imagen; 
    public $descripcion; 

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? ''; 
        $this->nombre_autor = $args['nombre_autor'] ?? ''; 
        $this->apellido_autor = $args['apellido_autor'] ?? ''; 
        $this->fecha = date('Y/m/d');
        $this->imagen = $args['imagen'] ?? ''; 
        $this->descripcion = $args['descripcion'] ?? ''; 
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[]="El titulo es obligatorio"; 
        }
        if(!$this->nombre_autor){
            self::$errores[]="El nombre es obligatorio"; 
        }
        if(!$this->apellido_autor){
            self::$errores[]="El apellido es obligatorio"; 
        }
        if(!$this->imagen){
            self::$errores[]="La imagen es obligatorio"; 
        }
        if(!$this->descripcion){
            self::$errores[]="El descripción es obligatorio"; 
        }

        return self::$errores; 

    }
} 