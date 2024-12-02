<?php



//Función para filtrar los campos
function filtrarInput($input){
    $input = trim($input);//eliminar espacios en blanco
    $input = stripslashes($input);//eliminar barras invertidas
    $input = htmlspecialchars($input);//convertir caracteres especiales en html

    return $input;
}


//Función para comprobar si la información introducida es válida
function comprobarInfo($info){
    $inputFiltrado = filtrarInput($info);

    return (empty($inputFiltrado)  || !preg_match('/^[a-zA-Z0-9\s]*$/', $info))? false : true;  
}


//Función para validar los campos
function validarInfo($nombreU, $apellidosU, $usernameU, $contrasenaU){
    if (comprobarInfo($nombreU) && comprobarInfo($apellidosU) && comprobarInfo($usernameU) && comprobarInfo($contrasenaU))
    {
        
       return true; 
    }
    else
    {
        return false;
    }  
}



    
    


/*//Función para listar usuarios PDO
function listarUsuariosPdo(){
    try {
        $conexion = conexionPDO('tareas');//conectamos a la DB(PDO)
        $consulta = $conexion->prepare(//preparamos la consulta
                        "SELECT id, username, nombre, apellidos, contrasena FROM usuarios");
        $consulta->execute();//ejecutamos la consulta
        $usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
        //fetchAll: obtiene los datos de la consulta en una sola vez
        //POD::FETCH_ASSOC: especifica el formato en que se devuelven los datos, en este caso en un array asociativo
        
        
    } 
    //capturamos la excepción
    catch (mysqli_sql_exception $e) {
        echo "<div class='alert alert-danger'>Error al introducir los datos</div>";
    }
    //finalizamos la conexión
    finally {
        $conexion = null;
    }
    return $usuarios;
}

*/