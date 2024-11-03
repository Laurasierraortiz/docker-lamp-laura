<!--FORMULARIO-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php
        include ("header.php"); //enlace a la cabecera
    ?>
    <div class="container-fluid">
        <div class="row">
        <?php
            include ("menu.php"); //enlace al menú
        ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <!--Contenido del formulario-->
                <h2>Formulario</h2>
                </div>
                <div class="container" name="creacion-tareas" action="nueva.php" method="post">

                <form class="mb-5" method="post" action="nueva.php" name="formulario"><!--enlazamos a nueva.php-->

                <!-- identificador -->
                <div class="mb-3">
                    <label class="form-label">Identificador</label>
                    <input class="form-control" name="id">
                </div>

                <!-- descripción -->
                <div class="mb-3">  
                    <label class="form-label" for="Descripcion">Descripción:</label><br>
                    <input class="form-control" type="text" id="Descripcion" name="descripcion"><br>
                </div>
                
                <!-- estado -->
                <div class="mb-3"> 
                    <label for="estado">Elige un estado</label>
                    <select class="form-select" name="estado" id="estado">
                        <option value="pendiente">Pendiente</option>
                        <option value="en proceso">En proceso</option>
                        <option value="completada">Completada</option>
                    </select>

                    <br>
                </div>
                
                <button type="submit" class="btn btn-primary">Enviar</button>

                </form>
                </div>
            </main>
        </div>
    </div>
    
    <?php
        include ("footer.php"); //enlace al pie de página
    ?>
</body>
</html>