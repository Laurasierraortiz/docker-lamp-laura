<?php



include_once('mysqli.php');//incluimos el archivo de conexión a la db

try {
    //Conectamos la db
    $conexion = conexionMysqli('biblioteca');

    //CREAR BASE DE DATOS
    //Comprobamos si ya existe la db
    $consulta = $conexion->query("SHOW DATABASES LIKE 'biblioteca'");//muestra una lista de DB con el nombre 'biblioteca'

        if($consulta && $consulta->num_rows == 0){//si el resultado de $consulta tiene 0 filas es que no hay ninguna tabla con ese nombre
            //Creamos la db
            if($conexion->query("CREATE DATABASE 'tareas'")){
                echo "Base de datos creada correctamente";
            }
            else{
                echo "Error al crear la base de datos" . $conexion->error;
            }
        }
        else{
            echo "La base de datos ya existe";
        }

        //CREAR TABLA USUARIO
        //Seleccionamos la tabla
        $conexion-> select_db('biblioteca');
        $usuarios = "CREATE TABLE IF NOT EXISTS usuarios(
                    id INT AUTO_INCREMENT PRIMARY KEY , 
                    nombre VARCHAR(100) NOT NULL , 
                    apellidos VARCHAR(100) NOT NULL , 
                    localidad VARCHAR(100) NOT NULL)" ; 
        //Comprobamos que se ha creado correctamente
        if($conexion->query($usuarios)){
            echo "La tabla 'usuarios' se ha creado correctamente";
        }
        else{
            echo "Error al crear la tabla 'usuarios'";
        }

        //CREAR LA TABLA LIBROS
        //Seleccionamos la tabla
        $conexion-> select_db('biblioteca');
        $libros = "CREATE TABLE IF NOT EXISTS libros(
                    id INT AUTO_INCREMENT PRIMARY KEY,    
                    titulo VARCHAR(255) NOT NULL,          
                    fecha_prestamo DATE,                   
                    disponible BOOLEAN DEFAULT TRUE,       
                    id_usuario INT, FOREIGN KEY (id_usuario) REFERENCES usuarios(id))";
         //Comprobamos que se ha creado correctamente
         if($conexion->query($libros)){
            echo "La tabla 'libros' se ha creado correctamente";
        }
        else{
            echo "Error al crear la tabla 'libros'";
        }
}
    
catch (mysqli_sql_exception $e) {
    echo "Error al crear la base de datos" . $e->getMessage();
}
finally{
    desconexionMysqli($conexion);//desconectamos la db
}     
?>