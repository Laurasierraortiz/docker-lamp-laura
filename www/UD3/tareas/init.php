<!--INIT-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('header.php');?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('menu.php'); ?>
            

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Laura Sierra Ortiz</h2>
                </div>

                <div class="container justify-content-between">
                    <p>Tarea Unidad 3 </p>

                    <?php
                    //Incluimos archivo de conexión
                    include_once('mysqli.php');

                    //CREAR LA DB
                    function crearDB(){
                        
                        try {
                            //Llamamos a la función de conexión
                            $conexion = conexionMysqliDB();
                            
                            //Preparamos la consulta para crear la db
                            $consulta = "CREATE DATABASE tareas2";

                            //Comprobamos que se ejecutó correctamente
                            if($conexion->execute($consulta)){
                               echo '<div class="alert alert-success" role="alert">Base de datos creada correctamente</div>';
                            }
                            else {
                                echo '<div class="alert alert-danger" role="alert">Error al crear la base de datos' . $e->getMessage() . '</div>';
                            }
                        } 
                        catch (mysqli_sql_exception $e){
                            echo '<div class="alert alert-danger" role="alert">La base de datos ya existe' . $e->getMessage() . '</div>';
                        }
                        finally{
                            desconexionMysqli($conexion);
                        }
                    }
                    

                    //CREAR TABLA USUARIOS
                    function crearUsuarios(){
                        try {
                            //Conectamos a la db
                            $conexion = conexionMysqli();
                            //Seleccionamos la db donde crearemos la tabla
                            $conexion-> select_db('tareas2');
                            //Preparamos la consulta de creación de la tabla
                            $consulta = 'CREATE TABLE IF NOT EXISTS usuarios(
                                id INT AUTO_INCREMENT PRIMARY KEY, 
                                nombre VARCHAR(50) NOT NULL, 
                                username VARCHAR(50) NOT NULL, 
                                apellidos VARCHAR(100) NOT NULL,
                                contrasena VARCHAR(100)
                            )';
                            //Comprobamos que se ha creado correctamente
                            if ($conexion->query($consulta)) {
                                echo '<div class="alert alert-success" role="alert">Tabla creada correctamente</div>';
                            }
                            else {
                                echo '<div class="alert alert-danger" role="alert">Error al crear la tabla' . $e->getMessage() . '</div>';
                                }
                        }  
                        catch (mysqli_sql_exception $e) {
                                echo '<div class="alert alert-danger" role="alert">La tabla ya existe' . $e->getMessage() . '</div>';
                        }
                        finally{
                            desconexionMysqli($conexion);
                        }
                    }


                    //CREAR TABLA USUARIOS
                    function crearTareas(){
                        try {
                             //Conectamos a la db
                            $conexion = conexionMysqli();
                            //Seleccionamos la db donde crearemos la tabla
                            $conexion-> select_db('tareas2');
                            //Preparamos la consulta de creación de la tabla
                            $consulta = 'CREATE TABLE IF NOT EXISTS tareas(
                                id INT AUTO_INCREMENT PRIMARY KEY, 
                                titulo VARCHAR(50) NOT NULL, 
                                descripcion VARCHAR(250) NOT NULL, 
                                estado VARCHAR(50) NOT NULL,
                                 id_usuario INT NOT NULL ,
                                FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
                            )';
                            //Comprobamos que se ha creado correctamente
                            if ($conexion->query($consulta)) {
                                echo '<div class="alert alert-success" role="alert">Tabla creada correctamente</div>';
                            }
                            else {
                                echo '<div class="alert alert-danger" role="alert">Error al crear la tabla' . $e->getMessage() . '</div>';
                                }
                        }  
                        catch (mysqli_sql_exception $e) {
                            echo '<div class="alert alert-danger" role="alert">La tabla ya existe' . $e->getMessage() . '</div>';
                        }
                        finally{
                            desconexionMysqli($conexion);
                        }
                    }
                    crearDB();
                    crearUsuarios();
                    crearTareas();

                    

                    ?>
                    
                </div>
            </main>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    
</body>
</html>