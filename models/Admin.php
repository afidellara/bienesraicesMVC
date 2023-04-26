<?php

namespace Model;
 
class Admin extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasBD = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {
        if (!$this->email) {
            self::$errores[] = "Email es obligatorio";
        }
        if (!$this->password) {
            self::$errores[] = "Contraseña es obligatorio";
        }
        return self::$errores; 
    }

    public function existeUsuario(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1 "; 
        $resultado = self::$baseDatos->query($query); 

        if(!$resultado->num_rows){
            self::$errores[] = "El usuario no existe"; 
            return; 
        } 

        return $resultado; 
    }
    
    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object(); 
        
        $this->autenticado = password_verify( $this->password, $usuario->password );
        
        if(!$this->autenticado){
            self::$errores[] = "Contraseña invalida"; 
        } 

        return $this->autenticado; 
        

    }

    public function autenticar(){
        session_start(); 
        $_SESSION['usuario']=$this->email; 
        $_SESSION['login']=true; 

        header('Location: /propiedades/admin'); 
    }
}
