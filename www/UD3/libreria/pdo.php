<?php
//CONEXIÓN CREACIÓN DB
function conexionDBPDO(){
    //1.Variables sin la db
    $servername = 'db';
    $username = 'root';
    $password = 'test';
    //2.Creamos el objeto de la conexión
    $conexion = new PDO("mysql:host=$servername", $username, $password);
    //3.Forzamos las excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //4.Devolvemos la conexión
    return $conexion;
}

//CONEXIÓN CREACIÓN DB
function conexionPDO(){
    //1.Variables con la db
    $servername = 'db';
    $username = 'root';
    $password = 'test';
    $dbname = 'libreria';
    //2.Creamos el objeto de la conexión
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //3.Forzamos las excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //4.Devolvemos la conexión
    return $conexion;
}

//DESCONEXIÓN DB
function desconexionPDO($conexion){
    $conexion = null;
}

//REGISTRAR AUTORES
function registrarAutores($nombre, $nacionalidad){//función con los parámetros del formulario
    try {
        //1.Conectamos a la db
        $conexion = conexionPDO();
        //2.Preparamos la consulta
        $consulta = $conexion->prepare("INSERT INTO autores (nombre, nacionalidad) VALUES (:nombre, :nacionalidad)");
        //3.Insertamos los valores en los parámetros
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':nacionalidad', $nacionalidad);
        //4.Ejecutamos la consulta
        $consulta->execute();

        echo '<div class="alert alert-success" role="alert">Autor registrado correctamente/div>';
    }
    //5.Capturamos la excepción
    catch(PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error al registrar el autor' . $e->getMessage() . '</div>';
    }
    //6.Cerramos la conexión
    finally {
        desconexionPDO($conexion);
    }
}
//MOSTRAR AUTORES
function mostrarAutores(){
    try {
        //1.Conectamos a la db
        $conexion = conexionPDO();
        //2.Preparamos la consulta
        $consulta = $conexion->prepare("SELECT id, nombre, nacionalidad FROM autores");
        //3.Ejecutamos la consulta
        $consulta->execute();
        //4.Convertimos la consulta en un array
        $result = $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $resultados = $consulta->fetchAll();
        //5.Devolvemos el resultado
        return $resultados;
    }
    catch(PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error al mostrar la lista de autores' . $e->getMessage() . '</div>';
    }
    finally {
        desconexionPDO($conexion);
    }
}

//BORRAR AUTORES
function borrarAutores($id){
    try {
        //1.Conectamos a la db
        $conexion = conexionPDO();
        //2.Preparamos la consulta
        $consulta = $conexion->prepare("DELETE FROM autores WHERE id=:id");
        //3.Insertamos los valores en los parámetros
        $consulta->bindParam(':id', $id);
        //4.Ejecutamos la consulta
        $consulta->execute();

        echo 'Usuario borrado <br>';
    }
    catch(PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error al borrar el usuario' . $e->getMessage() . '</div>';
    }
    finally {
        desconexionPDO($conexion);
    }
}

//EDITAR AUTORES
function editarAutores($id){
    try {
        //1.Conectamos a la db
        $conexion = conexionPDO();
        //2.Preparamos la consulta
        $consulta = $conexion->prepare("SELECT id, nombre, nacionalidad FROM autores WHERE id=:id");
        //3.Insertamos los valores en los parámetros
        $consulta->bindParam(':id', $id);
        //4.Ejecutamos la consulta
        $consulta->execute();
        //5.Convertimos la consulta en un array
        $result = $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $resultados = $consulta->fetch();
        return $resultados;
        //6.Ejecutamos la consulta
    }
    catch(PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error al editar el usuario' . $e->getMessage() . '</div>';
    }
    finally {
        desconexionPDO($conexion);
    }
}


//ACTUALIZAR AUTORES
function actualizarAutores($id, $nombre, $nacionalidad){
    try {
        //1.Conectamos a la db
        $conexion = conexionPDO();
        //2.Preparamos la consulta
        $consulta = $conexion->prepare("UPDATE autores SET nombre = :nombre, nacionalidad = :nacionalidad WHERE id = :$id");
        //3.Insertamos los valores en los parámetros
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':nacionalidad', $nacionalidad);
        $consulta->bindParam(':id', $id);
        //4.Ejecutamos la consulta
        $consulta->execute();

        echo '<div class="alert alert-success" role="alert">Autor actualizado correctamente/div>';
    }
    //5.Capturamos la excepción
    catch(PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error al actualizar el autor' . $e->getMessage() . '</div>';
    }
    //6.Cerramos la conexión
    finally {
        desconexionPDO($conexion);
    }
}






?>

