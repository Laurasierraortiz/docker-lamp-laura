<!--FORMULARIO PARA NUEVA TAREA-->
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
                <form action="nueva.php" method="POST" class="mb-2 w-50">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>
                <div class="mb-3">
                    <label for="">Estado</label>
                    <select class="form-select" name="estado" id="estado">
                        <option selected disabled value="">Selecciona estado</option>
                        <option>Pendiente</option>
                        <option>En proceso</option>
                        <option>Completada</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Usuario</label>
                    <select class="form-select" name="usuario" id="usuario">
                        <option disabled value="">Seleccione un usuario</option>
                                  
                    </select>
                </div>

                <div>
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
