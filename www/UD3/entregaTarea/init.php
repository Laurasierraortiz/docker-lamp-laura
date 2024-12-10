<!--INIT-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('header.php');?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Inicio</h2>
                </div>

                <div class="container justify-content-between">
                <?php

                
                include_once('mysqli.php');//incluimos el archivo mysqli.php

                
                try{
                    //Establecemos la conexión a la base de datos
                    $conexion = conexionMysqli(null);

                    //Comprobamos si existe la DB
                    $sql = "SHOW DATABASES LIKE 'tareas'";//muestra una lista de DB
                    $resultado = $conexion->query($sql);//llamamos al método query que ejecuta la consulta almacenada en '$sql'
                    $error = $conexion->errno;//almacenamos en una variable el número de error

                    if($resultado->num_rows === 0){//si el resultado de la consulta no contiene filas es que no hay ninguna tabla creada
                        //Creamos la DB
                        $sql = 'CREATE DATABASE tareas';//creamos la tabla
                        if($conexion->query($sql) === TRUE){
                            echo "<div class='alert alert-success'>Base de datos creada correctamente</div>";
                            
                        }
                        else{
                            echo "<div class='alert alert-danger'>Error al crear la base de datos: . $conexion->error.</div>"; 
                        }
                    }
                    else{
                        echo "<div class='alert alert-danger'>La base de datos ya existe.</div>";
                    }
                    
                    //Seleccionamos la DB
                    $conexion-> select_db('tareas');
                    //Creamos la tabla usuarios
                    $usuarios = "CREATE TABLE IF NOT EXISTS usuarios(
                                id INT AUTO_INCREMENT PRIMARY KEY,
                                username VARCHAR(50) NOT NULL,
                                nombre VARCHAR(50) NOT NULL,
                                apellidos VARCHAR(100) NOT NULL,
                                contrasena VARCHAR(100) NOT NULL
                                )";
                    //Comprobamos que se han creado correctamente
                    if($conexion->query($usuarios)){
                        echo "<div class='alert alert-success'>Tabla 'usuarios' correctamente.</div>";
                    }
                    else{
                        echo "<div class='alert alert-success'>Error al crear la tabla 'usuarios' . $conexion->error</div>";
                    }

                    
                    //Creamos la tabla tareas
                    $tareas = "CREATE TABLE IF NOT EXISTS tareas(
                                id INT AUTO_INCREMENT PRIMARY KEY,
                                titulo VARCHAR(50) NOT NULL,
                                descripcion VARCHAR(250) NOT NULL,
                                estado VARCHAR(50) NOT NULL,
                                id_usuario INT, FOREIGN KEY(id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE ON UPDATE CASCADE
                                )";

                    //Comprobamos que se han creado correctamente
                    if($conexion->query($tareas)){
                        echo "<div class='alert alert-success'>Tabla 'tareas' creada correctamente.</div>";
                    }
                    else{
                        echo "<div class='alert alert-danger'>Error al crear la tabla 'tareas'. $conexion->error</div>";
                    }
                }

                //Comprobamos si hay errores de conexión
                catch(mysqli_sql_exception $e){
                        echo "<div class='alert alert-danger'>Error en la conexión: " . $e->getMessage() . "</div>";
                }

                //Cerramos la conexión
                finally{
                    if(isset($conexion) && $conexion->connect_errno === 0){
                        $conexion->close(); 
                    }       
                } 

                 ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    
</body>
</html>