<!DOCTYPE html>
<html lang="es">
<?php include_once('../head.php'); ?>
<body>
    <?php 
    include_once('../header.php'); 
    include_once('../menu.php'); 
    ?>

    <div class="container mt-4">
        <div class="row">
            <!-- Formulario para Autores -->
            <div class="col-md-6">
                <h3>Registrar Autor</h3>
                <!--1.Enviamos el formulario a través de action-->
                <form action="nuevoAutor.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Autor</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nacionalidad</label>
                        <input type="text" name="nacionalidad" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Registrar</button>
                </form>
            </div>
    </div>
    <?php include_once('../footer.php'); ?>
</body>
</html>
