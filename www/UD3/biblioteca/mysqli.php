<?php
//FUNCIÓN PARA CONECTAR A LA DB
function conexionMysql(){
    $conexion = new mysqli('db', 'root', 'test', 'biblioteca');//conectamos a la db con los datos correspondientes

    return $conexion;
}

//FUNCIÓN PARA DESCONECTAR LA DB
function cerrarMysqli($conexion){
    if(isset($conexion) && $conexion->connect_errno === 0){
        $conexion->close();//cerramos la conexión
    }
}
//isset: comprueba que la variable '$conexion' está definida y no es null
//connect_errno: propiedad del objeto MySQLi que almacena el número de error. Si la conexión fue exitosa, esta propiedad tiene el valor 0.


//FUNCIÓN PARA MOSTRAR LIBROS
function mostrarLibros(){
    try {
        $conexion = conexionMysql();//conectamos a la db

         if ($conexion->connect_error){//contiene un mensaje de error
            return "Error al conectar la base de datos" . $conexion->error;//muestra el mensaje de error
         } 
         
        $consulta = "SELECT l.* FROM libros AS l 
                     LEFT JOIN usuarios AS u ON l.id_usuario = u.id;";
        
        $stmt = $conexion->query($consulta);//preparamos la consulta
        $resultado = $stmt->fetch_all(MYSQLI_ASSOC);//guardamos el resultado en un array asociativo

        return $resultado;
    } 
    catch (mysqli_sql_exception $e) {//guardamos la excepción en la variable 'e'
        return "Error al mostrar los usuarios" . $e->getMessage();//mostramos el mensaje
    }
    finally{
        cerrarMysqli($conexion);//cerramos la conexión
    }
}

//FUNCIÓN PARA REGISTRAR LIBROS
function registrarLibros($titulo){
    try {
        $conexion = conexionMysql();

        if($conexion->connect_error){
            return [false, "Error al conectar la base de datos"];
        }
        else{
           $consulta = $conexion->prepare("INSERT INTO libros (titulo, fecha_prestamo, disponible, id_usuario) VALUES (?, NULL, true, NULL)");
           $consulta->bind_param("s", $titulo);
           $consulta->execute();

           return [true, "Libro guardado correctamente"];
        }
    } 
    catch (mysqli_sql_exception $e) {
        return [false, "Error al guardar el libro" . $e->getMessage()];
    }
    finally{
        cerrarMysqli($conexion);
    }
}


//FUNCIÓN PARA FILTRAR LIBROS DISPONIBLES
function librosDisponibles(){
    try {
        $conexion = conexionMysql();//conectamos a la db

        if ($conexion->connect_error){//contiene un mensaje de error
            return "Error al conectar la base de datos" . $conexion->error;//muestra el mensaje de error
        } 
        
        $consulta = "SELECT * FROM libros WHERE disponible = true";
        
        $stmt = $conexion->query($consulta);//preparamos la consulta
        $resultado = $stmt->fetch_all(MYSQLI_ASSOC);//guardamos el resultado en un array asociativo

        return $resultado;
    } 
    catch (mysqli_sql_exception $e) {//guardamos la excepción en la variable 'e'
        return "Error al registrar los libros" . $e->getMessage();//mostramos el mensaje
    }
    finally{
        cerrarMysqli($conexion);//cerramos la conexión
    }
}

//FUNCIÓN PARA FILTRAR LIBROS DISPONIBLES
function librosNoDisponibles(){
    try {
        $conexion = conexionMysql();//conectamos a la db

        if ($conexion->connect_error){//contiene un mensaje de error
            return "Error al conectar la base de datos" . $conexion->error;//muestra el mensaje de error
        } 
        
        $consulta = "SELECT * FROM libros WHERE disponible = false";
        
        $stmt = $conexion->query($consulta);//preparamos la consulta
        $resultado = $stmt->fetch_all(MYSQLI_ASSOC);//guardamos el resultado en un array asociativo

        return $resultado;
    } 
    catch (mysqli_sql_exception $e) {//guardamos la excepción en la variable 'e'
        return "Error al registrar los libros" . $e->getMessage();//mostramos el mensaje
    }
    finally{
        cerrarMysqli($conexion);//cerramos la conexión
    }
}

//FUNCIÓN PARA PRESTAR LIBRO
function prestarLibro($id_usuario, $id_libro){
    try {
        $conexion = conexionMysql();
        if($conexion->connect_error){
            return [false, "Error al conectar la base de datos" . $conexion->error];//muestra el mensaje de error
        }
        $consulta = $conexion->prepare("UPDATE libros SET fecha_prestamo = NOW(), disponible= false, id_usuario = ? WHERE id = ?") ;
        $consulta->bind_param("ii", $id_usuario, $id_libro);
        $consulta->execute();

        return [true, "El libro se ha registrado correctamente"];

       
    } catch (mysqli_sql_exeption $e) {
        return [false, "Error al registrar los libros" . $e->getMessage()];//mostramos el mensaje
    }
    finally{
        cerrarMysqli($conexion);
    }
}


?>