<!--EDITAR TAREAS-->
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
                    <h2>Edita tarea</h2>
                </div>

                <div class="container justify-content-between">
                <?php
                include_once('../mysqli.php');
                $id_url = $_GET['id']; 

                $tarea = [];
                $usuarios = [];

                try {
                    $conexion = conexionMysqli('tareas');

                    // Obtener la tarea
                    $consulta = $conexion->prepare(
                                                "SELECT titulo, descripcion, estado, id_usuario FROM tareas WHERE id = ?");
                    $consulta->bind_param("i", $id_url);
                    $consulta->execute();
                    $resultado = $consulta->get_result();
                    $tarea = $resultado->fetch_assoc();

                    // Obtener todos los usuarios
                    $usuariosSelect = $conexion->query("SELECT id, username FROM usuarios");
                    while ($usuario = $usuariosSelect->fetch_assoc()) {
                        $usuarios[] = $usuario;
                    }
                } catch (mysqli_sql_exception $e) {
                    echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
                } finally {
                    $conexion->close();
                }
            ?>

                <form action="editaTarea.php" method="POST" class="mb-2 w-50">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $tarea['titulo']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $tarea['descripcion'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="">Estado</label>
                    <select class="form-select" name="estado">
                        <option selected disabled value="">Selecciona estado</option>
                        <option value="Pendiente" <?php echo $tarea['estado'] == 'Pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="En proceso" <?php echo $tarea['estado'] == 'En proceso' ? 'selected' : ''; ?>>En proceso</option>
                        <option value="Completada" <?php echo $tarea['estado'] == 'Completada' ? 'selected' : ''; ?>>Completada</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Usuario</label>
                    <select class="form-select" name="usuario">
                    <option value="">Selecciona un usuario</option>
                    <?php 
                        foreach ($usuarios as $usuario) { ?>
                            <option value="<?php echo $usuario['id']; ?>" 
                                <?php echo $tarea['id_usuario'] == $usuario['id'] ? 'selected' : ''; ?>>
                                <?php echo $usuario['username']; ?>
                            </option>
                        <?php } ?>

                    
                    </select>
                </div>

                <div>
                    <input type="hidden" name="id" value="<?php echo $id_url?>">
                    <input type="submit" class="btn btn-success" value="Enviar">
                </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>