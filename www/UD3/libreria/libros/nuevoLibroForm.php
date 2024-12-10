<!DOCTYPE html>
<html lang="es">
<?php include_once('head.php'); ?>
<body>
    <?php 
    include_once('header.php'); 
    include_once('menu.php'); 
    ?>

    <div class="container mt-4">
        <div class="row">
           
            <!-- Formulario para Libros -->
            <div class="col-md-6">
                <h3>Registrar Libro</h3>
                <form action="crear_libro.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Año de Publicación</label>
                        <input type="number" name="anio_publicacion" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor</label>
                        <select name="id_autor" class="form-select" required>
                            <option selected disabled>Selecciona un Autor</option>
                            <?php
                            // Aquí debes realizar la consulta para cargar los autores desde la base de datos
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Registrar</button>
                </form>
            </div>
        </div>

        
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>
