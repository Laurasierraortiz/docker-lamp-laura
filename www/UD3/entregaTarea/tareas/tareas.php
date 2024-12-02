<!--LISTADO DE TAREAS-->
<!--
- Botón de editar (editaTareaForm.php)
- Botón de borrar (borraTarea.php)
- Mostrar el nombre de cada usuario (username)-->
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
                    <h2>Lista de Tareas</h2>
                </div>

                <div class="container justify-content-between">
                
                
                    <div class="table">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Usuario</th>
                                    
                                    
                                </tr>
                            </thead>
                        
                            <tbody>
                            <?php
                                include_once('../mysqli.php');
                                try {
                                    // Conectar y obtener datos de la base de datos.
                                    $conexion = conexionMysqli('tareas');
                                    $consulta = $conexion->query("
                                                            SELECT 
                                                                tareas.id, tareas.titulo, tareas.descripcion, tareas.estado, usuarios.username 
                                                                FROM tareas LEFT JOIN usuarios 
                                                                ON tareas.id_usuario = usuarios.id");
                                    if ($consulta->num_rows > 0) {
                                        while ($tarea = $consulta->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $tarea['id'] . "</td>";
                                            echo "<td>" . $tarea['titulo'] . "</td>";
                                            echo "<td>" . $tarea['descripcion'] . "</td>";
                                            echo "<td>" . $tarea['estado'] . "</td>";
                                            echo "<td>" . $tarea['username'] . "</td>";

                                            echo "<td>
                                                <a href='editaTareaForm.php?id=" . htmlspecialchars($tarea['id']) . "' class='btn btn-warning btn-sm'>Editar</a>
                                                <a href='borraTarea.php?id=" . htmlspecialchars($tarea['id']) . "' class='btn btn-danger btn-sm'>Borrar</a>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>No hay tareas registradas</div>";
                                    }

                                } 
                                catch (mysqli_sql_exception $e) {
                                    echo "<div class='alert alert-danger'>Error al listar usuarios " . $e->getMessage() . "</div>";
                                }
                                finally{
                                    $conexion->close();
                                }
                                
                            ?>
                        </table>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>