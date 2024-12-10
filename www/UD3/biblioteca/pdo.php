<?php
//CONEXIÓN A LA DB
function conexionPDO(){
    //Definimos las variables con los datos de la db
    $servername = 'db';
    $username = 'root';
    $password = 'test';
    $dbname = 'biblioteca';
    
    //Creamos el objeto de la conexión en la variable $conexion
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //Forzamos la excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $conexion;
}

//DESCONEXIÓN DE LA DB
function desconexionPDO($conexion){
    $conexion = null;
}


//REGISTRAR USUARIOS
function registroUsuarios($nombre, $apellidos, $localidad){
    try {
        //Conectamos a la db
        $conexion = conexionPDO();

        //Preparamos la consulta
        $consulta = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos,localidad) VALUES(:nombre, :apellidos, :localidad)");
        //Insertamos los valores que vamos a introducir en los parámetros, en este caso las variables donde guardamos los valores del formulario
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':apellidos', $apellidos);
        $consulta->bindParam(':localidad', $localidad);
        //Ejecutamos la consulta
        $consulta->execute();
        //$consulta->CloseCursor();

        //Devolvemos true y el mensaje correspondiente
        return [true, "Usuario registrado correctamente"];
    } 
    catch (PDOException $e) {
        //Devolvemos false y el mensaje correspondiente
        return [false, "Error al registrar el usuario"];
    }
    finally{
        desconexionPDO($conexion);
    } 
}

//MOSTRAR USUARIOS
function mostrarUsuarios(){
    try {
        //Conectamos la db
        $conexion = conexionPDO();

        //Preparamos la consulta
        $consulta = $conexion->prepare("SELECT * FROM usuarios");
        //Ejecutamos la consulta
        $consulta->execute();
        //Mostramos el resultado de la consulta en un array
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);


        return $resultado;
        
    } catch (PDOException $e) {
        return "Error al mostrar los usuarios" . $e->getMessage();
    }
    finally{
        desconexionPDO($conexion);
    }
}




?>