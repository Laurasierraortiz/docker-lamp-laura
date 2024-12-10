<?php
//CONEXIÓN A LA DB
function conexionMysqli(){
    $conexion = new mysqli('db', 'root', 'test');//conectamos a la db con los datos correspondientes

    return $conexion;
}

//FUNCIÓN PARA DESCONECTAR LA DB
function desconexionMysqli($conexion){
    if(isset($conexion) && $conexion->connect_errno === 0){
        $conexion->close();//cerramos la conexión
    }
}
//isset($conexion): verificamos si la variable $conexión está definida
//$conexion->connect_errno === 0: si el número de error(connect_errno) es 0 es que no hay errores y podemos cerrar la conexión


//REGISTRAR LIBROS
function registrarLibros($titulo){
    try {
        //Conexión a la db
        $conexion = conexionMysqli('biblioteca');
        if($conexion->connect_error){
            return  '<div class="alert alert-success" role="alert"> Error al conectar la base de datos </div';
        }
        else{
            //Preparamos la consulta
            $consulta = $conexion->prepare("INSERT INTO libros (titulo, fecha_prestamo, disponible, id_usuario) VALUES(?, NULL, true, NULL)");
            //Convertimos el resultado de la consulta en un array
            $consulta->bind_param("s", $titulo);
            $consulta->execute();
            //Devolvemos true y el mensaje correspondiente
            return '<div class="alert alert-success" role="alert"> Libro registrado correctamente </div';
        }
        
    } 
    catch (mysqli_sql_exeption $e) {
        //Devolvemos false y el mensaje correspondiente
        return '<div class="alert alert-danger" role="alert">Error al registrar el libro</div>';
    }
    finally{
        //Desconectamos la db
        desconexionMysqli($conexion);
    }
}


//FUNCIÓN PARA MOSTRAR LIBROS
function mostrarLibros(){
    try {
        //Conectamos la db
        $conexion = conexionMysqli('biblioteca');

        if ($conexion->connect_error){//contiene un mensaje de error
            return "Error al conectar la base de datos" . $conexion->error;//muestra el mensaje de error
         }
         
            //Preparamos la consulta
            $consulta = $conexion->query("SELECT l.* FROM libros AS l LEFT JOIN usuarios AS u ON l.id_usuario = u.id");
            
            //Convertimos el resultado de la consulta en un array
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            //Devolvemos el resultado
            return $resultado;
         
       
    } 
    catch (mysqli_sql_exception $e) {
        return '<div class="alert alert-danger" role="alert">Error al registrar el libro: ' . $e->getMessage() . '</div>';
    }
    finally{
        desconexionMysqli($conexion);
    }
}

?>