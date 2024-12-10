<?php

//CONEXIÓN DB
function conexionMysqli($dbName){
    $conexion = new mysqli('db', 'root', 'test', $dbName);

    return $conexion;
}

?>
