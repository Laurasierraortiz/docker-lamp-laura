<?php
//CREACIÓN DB
function conexionMysqliDB(){
    //Definimos los datos de conexión de la db
    $conexion = new mysqli('db', 'root', 'test', null);
    //Devolvemos la conexión
    return $conexion;
}

//CONEXIÓN DB
function conexionMysqli(){
    //Definimos los datos de conexión de la db
    $conexion = new mysqli('db', 'root', 'test', 'tareas2');
    //Devolvemos la conexión
    return $conexion;
}


//DESCONEXIÓN DB
function desconexionMysqli($conexion){
    //isset($conexion): comprobamos que la variable $conexión está inicializada
    //$conexion->connect_errno === 0: comprobamos que el número de error es = 0(no hay errores de conexión)
    if(isset($conexion) && $conexion->connect_errno === 0){
    //Cerramos la conexión
    $conexion->close();
    }
}



//REGISTRAR TAREA
function registrarTareas($titulo, $descripcion, $estado, $usuario){
    try {
        //Conectamos a la db
        $conexion = conexionMysqli();

        //Preparamos la consulta
        $consulta = $conexion->prepare("INSERT INTO tareas (titulo, descripcion, estado, id_usuario) VALUES (?,?,?,?)");
        $consulta->bind_param("sssi", $titulo, $descripcion, $estado, $usuario);
        $consulta->execute();

        echo '<div class="alert alert-success" role="alert">Tarea guardada correctamente/div>';

    } 
    catch (mysqli_slq_exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error al registrar la tarea' . $e->getMessage() . '</div>';
    }
    finally{
        desconexionMysqli($conexion);
    }
}

//MOSTRAR TAREAS
function mostrarTareas(){
    try {
        //Conectamos a la db
        $conexion = conexionMysqli();

        //Preparamos la consulta
        $consulta = $conexion->query("SELECT tareas.id, tareas.titulo, tareas.descripcion, tareas.estado, usuarios.username 
                                                                FROM tareas LEFT JOIN usuarios ON tareas.id_usuario = usuarios.id");
        
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    } 
    catch (mysqli_slq_exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error al mostrar las tareas' . $e->getMessage() . '</div>';
    }
    finally{
        desconexionMysqli($conexion);
    }
}

//BORRAR TAREAS


//EDITAR TAREAS

//ACTUALIZAR TAREAS

//

?>




