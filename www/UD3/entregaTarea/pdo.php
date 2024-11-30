<?php
//Función para establecer conexión PDO
function conexionPDO($dbName){
    //declaración de las variables
    $servername = 'db';//servidor al que se conectará PDO
    $username = 'root';//nombre del usuario con el que nos conectaremos
    $password = 'test';//contraseña del usuario
    $dbname = $dbName;//guardamos el nombre de la DB como una variable donde pondremos el nombre de la DB que usaremos

    //Creación del objeto '$conexion'con la que estableceremos la conexión
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Forzar excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $conexion;
    }
?>