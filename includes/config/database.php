
<?php

function conectarBD(){
    $bd = new mysqli('localhost', 'root', '0500', 'bienesraices'); 

    if(!$bd){
        echo "Error la base de datos no se pudo conectar"; 
        exit;  
    }
    return $bd; 
}