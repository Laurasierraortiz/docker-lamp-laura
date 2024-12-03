<!--BORRAR USUARIO-->
<!-- 
- Comprobar que existe y borrar el usuario y sus tareas 
- Mostrar mensaje de borrado
-->
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
                    <h2></h2>
                </div>

                <div class="container justify-content-between">
                    
                    <?php
  
                    // Conexión a la DB (PDO) 
                    include_once('../pdo.php'); 
                    
                         
                        //Para seleccionar el id del usuario tenemos que cogerla  a través de la URL
                        $id_url = $_GET['id'];

                        try {
                            // Conexión a la base de datos
                            $conexion = conexionPDO('tareas');

                            // Eliminamos las tareas del usuario seleccionado
                            $consulta = $conexion->prepare(
                                                    "DELETE FROM tareas WHERE id_usuario = :id");
                            //Sustituimos cada parámetro por el valor introducido en el formulario
                            $consulta->bindParam(':id', $id_url, PDO::PARAM_INT);
                            $consulta->execute();//ejecutamos la consulta

                            //Eliminamos el usuario seleccionado
                            $consulta = $conexion->prepare("DELETE FROM usuarios WHERE id = :id");
                            //Sustituimos cada parámetro por el valor introducido en el formulario
                            $consulta->bindParam(':id', $id_url, PDO::PARAM_INT);
                            $consulta->execute();//ejecutamos la consulta

                            echo "<div class='alert alert-success'>Usuario borrado correctamente.</div>";
                            
                        } 
                        //capturamos la excepción
                        catch (PDOException $e) {
                            echo "<div class='alert alert-danger'>Error al eliminar el usuario: " . $e->getMessage() . "</div>";
                        } 
                        // Finalizamos la conexión
                        finally {
                            $conexion = null;
                        }

                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>