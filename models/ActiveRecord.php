<?php

namespace Model;

class ActiveRecord
{

  protected static $baseDatos;
  protected static $columnasBD = [];

  protected static $tabla = '';
  protected static $errores = [];

  public static function setBD($bd)
  {
    self::$baseDatos = $bd;
  }

  public function guardar()
  {

    if (!is_null($this->id)) {
      $this->actualizar();
    } else { 
      $this->crear();
    }
  }

  //GUARDAR
  public function crear()
  {
    $atributos = $this->sanitizarDatos();
    //Insertar en la base de datos
    $query = " INSERT INTO " . static::$tabla . " ( ";
    $query .= join(', ', array_keys($atributos));
    $query .= " ) VALUES (' ";
    $query .= join("', '", array_values($atributos));
    $query .= " ') ";

    $tabla = static::$tabla;


    $resultado = self::$baseDatos->query($query);
    if ($resultado) {
      self::redicionarQuery($tabla, 1);
    }
  }

  public function actualizar()
  {
    $atributos = $this->sanitizarDatos();

    $valores = [];
    foreach ($atributos as $key => $value) {
      $valores[] = "{$key}='{$value}'";
    }

    $query = "UPDATE " . static::$tabla . " SET ";
    $query .= join(', ', $valores);
    $query .= " WHERE id = '" . self::$baseDatos->escape_string($this->id) . "' ";
    $query .= " LIMIT 1 ";

    $resultado = self::$baseDatos->query($query);
    $tabla = static::$tabla;

    if ($resultado) {
      self::redicionarQuery($tabla, 2);
    }
  }

  public function eliminar()
  {
    $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$baseDatos->escape_string($this->id) . " LIMIT 1";
    $resultado = self::$baseDatos->query($query);
    $tabla = static::$tabla;

    if ($resultado) {
      $this->borrarImagen();
      self::redicionarQuery($tabla, 3);
    }
  }

  public function Datos()
  {
    $atributos = [];
    foreach (static::$columnasBD as $columna) {
      if ($columna === 'id') continue;
      $atributos[$columna] = $this->$columna;
    }

    return $atributos;
  }

  public function sanitizarDatos()
  {
    $atributos = $this->Datos();
    $sanitizado = [];
    foreach ($atributos as $key => $value) {
      $sanitizado[$key] = self::$baseDatos->escape_string($value);
    }
    return $sanitizado;
  }

  public function setImage($imagen)
  {

    if (!is_null($this->id)) {
      $this->borrarImagen();
    }

    if ($imagen) {
      $this->imagen = $imagen;
    }
  }

  public function borrarImagen()
  {
    $existeArchivo = file_exists(CARPETAS_IMAGENES . $this->imagen);

    if ($existeArchivo) {
      unlink(CARPETAS_IMAGENES . $this->imagen);
    }
  }

  public static function getErrores()
  {
    return static::$errores;
  }

  public function validar()
  {
    static::$errores = [];
    return static::$errores;
  }


  //CONSULTAR 
  public static function all()
  {
    $query = "SELECT * FROM " . static::$tabla;
    $resultado = self::consultarSQL($query);
    return $resultado;
  }

  public static function get($limite)
  {
    $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT " . $limite;
    $resultado = self::consultarSQL($query);
    return $resultado;
  }


  //buscar por ID 
  public static function find($id)
  {
    $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
    $resultado = self::consultarSQL($query);

    return array_shift($resultado);
  }

  public static function consultarSQL($query)
  {
    //consultar base de datos
    $resultado = self::$baseDatos->query($query);

    $array = [];


    while ($registro = $resultado->fetch_assoc()) {
      $array[] = static::crearObjeto($registro);
    }

    $resultado->free();

    return $array;
  }

  protected static function crearObjeto($registro)
  {
    $objeto = new static;

    foreach ($registro as $key => $value) {
      if (property_exists($objeto, $key)) {
        $objeto->$key = $value;
      }
    }

    return $objeto;
  }

  public function sincronizar($args = [])
  {
    foreach ($args as $key => $value) {
      if (property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

  public static function redicionarQuery($tabla, $accion)
  {
    $tabla = static::$tabla;
    if ($tabla === 'propiedades') {
      header("location: /propiedades/admin?resultado=$accion");
    } else if ($tabla === 'vendedores') {
      header("location: /vendedores/admin?resultado=$accion");
    } else if ($tabla === 'blogs'){
      header("location: /blogs/admin?resultado=$accion");
    }
  }
}
