<!--FORMULARIO PARA EDITAR TAREAS-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('../header.php');?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('../menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Nueva tarea</h2>
                </div>

                <div class="container justify-content-between">
                <?php 
                    include_once("../utils.php");

                    // Comprobamos si el formulario fue enviado por el método POST
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Recuperamos los datos del formulario
                        $id_tarea = $_POST['id'];
                        $titulo = $_POST['titulo'];
                        $descripcion = $_POST['descripcion'];
                        $estado = $_POST['estado'];
                        $id_usuario = $_POST['usuario']; 

                        // Llamamos a la función para filtrar y validar los datos
                        if (validarInfo($titulo, $descripcion, $estado, $id_usuario)) {
                            include_once('../mysqli.php');
                            try {
                                $conexion = conexionMysqli('tareas'); // Conexión a la DB (mysqli)

                                // Preparamos la consulta
                                $consulta = $conexion->prepare(
                                                    "UPDATE tareas SET titulo = ?, descripcion = ?, estado = ?,id_usuario = ? WHERE id = ?"
                                );
                                // Enlazamos los parámetros
                                $consulta->bind_param("sssii", $titulo, $descripcion, $estado, $id_usuario, $id_tarea);

                                // Ejecutamos la consulta
                                if ($consulta->execute()) {
                                    echo "<div class='alert alert-success'>Tarea actualizada correctamente.</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Error al ejecutar la consulta: " . $consulta->error . "</div>";
                                }
                            } catch (mysqli_sql_exception $e) {
                                echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
                            } finally {
                                $conexion->close();
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Validación de datos fallida. Verifique los campos.</div>";
                        }
                    }
                    ?>

                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>