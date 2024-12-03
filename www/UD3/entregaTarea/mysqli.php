<?php
//Función para establecer conexión mysqli
function conexionMysqli($dbName){
    $conexion = new mysqli('db', 'root', 'test', $dbName);

    return $conexion;
}

?>
