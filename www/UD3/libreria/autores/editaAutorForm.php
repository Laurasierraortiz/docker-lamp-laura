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

                <?php

                //1.Enlazamos el archivo de las funciones
                include_once('../pdo.php');
                //2.Cogemos el id del autor a editar a través de la url
                $id = $_GET['id'];
                //3.Llamamos a la función para editar el autor
                $autores = editarAutores($id);
                //4.Definimos las variables en las que tenemos los valores para que salgan en el formulario
                $nombre = $autores['nombre'];
                $nacionalidad = $autores['nacionalidad'];

                ?>

                <form action="editaAutor.php" method="POST">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $autores['id']; ?>" required>    

                    <div class="mb-3">
                        <label class="form-label">Nombre del Autor</label>         
                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nacionalidad</label>
                        <input type="text" name="nacionalidad" class="form-control" value="<?php echo $nacionalidad; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Registrar</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
</body>
</html>
