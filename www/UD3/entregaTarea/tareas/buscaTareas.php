<!--INDEX-->
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
                    <h2>Buscador de tareas</h2>
                </div>

                <div class="container justify-content-between">
                <form action="tareas.php" method="GET" class="needs-validation mb-4">
                        
                    <div class="mb-3">
                        <label for="">Estado</label>
                        <select class="form-select" name="">
                            <option selected disabled value="">Selecciona un estado estado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Estado</label>
                        <select class="form-select" name="">
                            <option selected disabled value="">Selecciona un estado estado</option>
                            <option>Pendiente</option>
                            <option>En proceso</option>
                            <option>Completada</option>
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