<?php
 $conexion = new mysqli('db', 'root', 'test', 'dbname');

 if($conexion->connect_error){
    die("Fallo en la conexión" . $conexion->connect_error);
 }
 echo "Conexión correcta";
?>