<?php

namespace Model;

class Propiedades extends ActiveRecord
{
  protected static $tabla = 'propiedades'; 
  protected static $columnasBD = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'banios', 'estacionamientos', 'creado', 'vendedores_id'];

    
  public $id;
  public $titulo;
  public $precio;
  public $descripcion;
  public $imagen;
  public $habitaciones;
  public $banios;
  public $estacionamientos;
  public $vendedores_id;
  public $creado;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->banios = $args['banios'] ?? '';
    $this->estacionamientos = $args['estacionamientos'] ?? '';
    $this->vendedores_id = $args['vendedores_id'] ?? '';
    $this->creado = date('Y/m/d');
  }

  public function validar()
  {
    if (!$this->titulo) {
      self::$errores[] = "Debe asignar un titulo";
    }

    if (!$this->precio) {
      self::$errores[] = "Debe asignar un precio";
    }

    if (strlen($this->descripcion) < 50) {
      self::$errores[] = "Debe asignar una descripción con al menos 50 caracteres";
    }
    if (!$this->habitaciones) {
      self::$errores[] = "Debe asignar una cantidad de habitaciones";
    }
    if (!$this->banios) {
      self::$errores[] = "Debe asignar una cantidad de baños";
    }
    if (!$this->estacionamientos) {
      self::$errores[] = "Debe asignar una cantidad de estacionamientos";
    }
    if (!$this->vendedores_id) {
      self::$errores[] = "Debe eligir un vendedor de la propiedad ";
    }
    if (!$this->imagen) {
      self::$errores[] = "Debe eligir una imagen para la propiedad ";
    }
    return self::$errores;
  }


}
