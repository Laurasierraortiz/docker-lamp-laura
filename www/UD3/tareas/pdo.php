<?php
//CONEXIÓN A LA DB
function conexionPDO(){
    //Definimos las variables con la información de la db
    $servername = 'db';
    $username = 'root';
    $password = 'test';
    $dbname = 'tareas2';
    //Creamos el objeto de la conexión
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Forzamos las excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Devolvemos la conexión
    return $conexion;
}


//DESCONEXIÓN A LA DB
function desconexionPDO($conexion){
    //Desconectamos la db
    $conexion = null;
}


//REGISTRAR USUARIOS
function registrarUsuarios($nombre, $apellidos, $username, $contrasena){
    try {
        //Conectamos a la db
        $conexion = conexionPDO();
        //Preparamos la consulta
        $consulta = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, username, contrasena) VALUES (:nombre, :apellidos, :username, :contrasena)");
        //Introducimos los valores en los parámetros
        $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $consulta->bindParam(':username', $username, PDO::PARAM_STR);
        $consulta->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        //Ejecutamos la consulta
        $consulta->execute();

        echo "<div class='alert alert-success'>Usuario creado correctamente</div>";
    }
    //Definimos la excepción
    catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error al crear el usuario' . $e->getMessage() . '</div>';
    }
    //Desconectamos la db
    finally{
        desconexionPDO($conexion);
    }
}

//MOSTRAR USUARIOS
function mostrarUsuarios(){
    try {
        //Conectamos a la db
        $conexion = conexionPDO();
        //Preparamos la consulta
        $consulta = $conexion->prepare("SELECT id, username, nombre, apellidos FROM usuarios");
        //Ejecutamos la consulta
        $consulta->execute();
        $usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }
    //Definimos la excepción
    catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error al mostrar los usuarios' . $e->getMessage() . '</div>';
    }
    //Desconectamos la db
    finally{
        desconexionPDO($conexion);
    }
}

//BORAR USUARIOS
function borrarUsuarios($id){
    try {
        //Conectamos a la db
        $conexion = conexionPDO();

        //Preparamos la consulta para borrar las tareas del usuario
        $consulta = $conexion->prepare("DELETE FROM tareas WHERE id_usuario = :id");
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        //Ejecutamos la consulta
        $consulta->execute();

        //Preparamos la consulta para borrar las tareas del usuario
        $consulta = $conexion->prepare("DELETE FROM usuarios WHERE id = :id");
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        //Ejecutamos la consulta
        $consulta->execute();
        
        echo '<div class="alert alert-success" role="alert">Usuario eliminado</div>';


    }
    //Definimos la excepción
    catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error al eliminar el usuario' . $e->getMessage() . '</div>';
    }
    //Desconectamos la db
    finally{
        desconexionPDO($conexion);
    }
}

//EDITAR USUARIOS
function editarUsuarios($id){
    try {
        //Conectamos a la base de datos
        $conexion = conexionPDO();
        //Preparamos la consulta de los datos que vamos a editar
        $consulta = $conexion->prepare("SELECT id, username, nombre, apellidos, contrasena FROM usuarios WHERE id = :id");
        //Insertamos los valores en los parámetros
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        //Ejecutamos la consulta
        $consulta->execute();
        //Convertimos la consulta en una fila
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
        //Devolvemos el valor de la fila
        return $usuario;
        
    }
    //Definimos la excepción
    catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error al editar el usuario' . $e->getMessage() . '</div>';
    }
    //Desconectamos la db
    finally{
        desconexionPDO($conexion);
    }
}

//ACTUALIZAR USUARIOS
function actualizarUsuarios($id, $nombre, $apellidos, $username, $contrasena){
    try {
        //Conectamos a la db
        $conexion = conexionPDO();

        //Preparamos la consulta para borrar las tareas del usuario
        $consulta = $conexion->prepare("UPDATE usuarios SET username = :username, nombre = :nombre, apellidos = :apellidos, contrasena = :contrasena WHERE id = :id");
        $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $consulta->bindParam(':username', $username, PDO::PARAM_STR);
        $consulta->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        //Ejecutamos la consulta
        $consulta->execute();

        echo '<div class="alert alert-success" role="alert">Usuario actualizado</div>';


    }
    //Definimos la excepción
    catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Error al actualizar el usuario' . $e->getMessage() . '</div>';
    }
    //Desconectamos la db
    finally{
        desconexionPDO($conexion);
    }
}

?>