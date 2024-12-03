<!--BUSCADOR DE TAREAS-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('../header.php');?>

    <div class="container-fluid">
        <div class="row">
            <?php include_once('../menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Buscador de Tareas</h2>
                </div>

                <div class="container justify-content-between">
                    <form action="tareas.php" method="GET" class="needs-validation mb-4">
                        
                        <div class="mb-3">
                            <label for="usuario">Usuario</label>
                            <select class="form-select" name="id_usuario" id="usuario" required>
                                <option selected disabled value="">Selecciona un usuario</option>
                                <?php
                                include_once('../pdo.php'); // Incluir archivo PDO para conexión a la base de datos

                                try {
                                    $conexion = conexionPDO('tareas'); // Conexión con PDO
                                    $consulta = $conexion->query("SELECT id, username FROM usuarios");

                                    // Mostrar los usuarios 
                                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='" . $fila['id'] . "'>" . $fila['username'] . "</option>";
                                    }
                                } catch (PDOException $e) {
                                    echo "<div class='alert alert-danger'>Error al conectar con la base de datos: " . $e->getMessage() . "</div>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="estado">Estado</label>
                            <select class="form-select" name="estado" id="estado">
                                <option selected disabled value="">Selecciona un estado (opcional)</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Completada">Completada</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Buscar</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>

</body>
</html>
