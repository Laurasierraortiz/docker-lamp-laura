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
           

        </div>

        <!-- Tabla de Libros Registrados -->
        <h2 class="mt-5">Libros Registrados</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Año de Publicación</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Aquí debes realizar la consulta para mostrar los libros registrados
                ?>
            </tbody>
        </table>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>
