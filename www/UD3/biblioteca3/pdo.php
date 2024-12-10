<?php

//FUNCIÓN PARA CONECTAR LA DB
function conexionPDO(){
    //Variables con los datos de la db
    $servername = 'db';
    $username = 'root';
    $password = 'test';
    $dbname = 'biblioteca';
    
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //setAttribute: establece atributos en el objeto PDO
    //PDO::ATTR_ERRMODE: indica como maneja PDO los errores.
    //PDO::ERRMODE_EXCEPCTION: si hay algún error lanza la excepción
    return $conexion;
}

//FUNCIÓN PARA MOSTRAR USUARIOS
function mostrarUsuarios(){
    try {
        $conexion = conexionPDO();//conectamos a la db
        
        $consulta = "SELECT `u`.*, `l`.`titulo`
                    FROM `usuarios` AS `u` 
	                LEFT JOIN `libros` AS `l` ON `l`.`id_usuario` = `u`.`id`;";//seleccionamos todo de la tabla usuarios
        
        $stmt = $conexion->query($consulta);//preparamos la consulta
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);//recupera los datos como un array asociativo

        return $resultado;
    } 
    
    catch (PDOException $e) {//guardamos la excepción en la variable 'e'
        return "Error al mostrar los usuarios" . $e->getMessage();//mostramos el mensaje de error
    }
    finally{
        $conexion = null;//cerramos la conexión
    }
}


//FUNCIÓN PARA REGISTRAR USUARIOS
function registrarUsuario($nombre, $apellidos, $localidad){
    try {
        $conexion = conexionPDO();

        $consulta = "INSERT INTO usuarios(nombre, apellidos, localidad) VALUES (:nombre, :apellidos, :localidad)";
        $insert = $conexion->prepare($consulta);
        $insert->bindParam(':nombre', $nombre);
        $insert->bindParam(':apellidos', $apellidos);
        $insert->bindParam(':localidad', $localidad);
        $insert->execute();
        $insert->CloseCursor();
    
        return [true, "Usuario guardado correctamente"];
     
    } catch (PDOException $e) {
        return [false, "Error al guardar el usuario" . $e->getMessage()];
    }
    finally{
        $conexion = null;
    }
}




