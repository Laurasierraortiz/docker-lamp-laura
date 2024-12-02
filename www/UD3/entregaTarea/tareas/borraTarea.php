<!--BORRAR TAREA-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('../header.php');?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('../menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Inicio</h2>
                </div>

                <div class="container justify-content-between">
                <?php
                
                // Conexión a la DB (PDO) 
                include_once('../pdo.php');  
                    
                    //Para seleccionar el id del usuario tenemos que cogerla  a través de la URL
                    $id = $_GET['id'];

                    include_once('../mysqli.php');
                    try {
                        // Conexión a la base de datos
                        $conexion = conexionMysqli('tareas');

                        // Eliminamos las tareas del usuario seleccionado
                        $consulta = $conexion->prepare(
                                                "DELETE FROM tareas WHERE id = ?");
                        //Sustituimos cada parámetro por el valor introducido en el formulario
                        $consulta->bind_param('i', $id);
                        $consulta->execute();//ejecutamos la consulta
                        $resultado = $consulta->get_result();

                        echo "<div class='alert alert-success'>Tarea borrada correctamente.</div>";
                    } 
                    //capturamos la excepción
                    catch (mysqli_sql_exception $e) {
                        echo "<div class='alert alert-danger'>Error al eliminar la tarea: " . $e->getMessage() . "</div>";
                    } 
                    // Finalizamos la conexión
                    finally {
                        $conexion->close();
                    }

                
                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>