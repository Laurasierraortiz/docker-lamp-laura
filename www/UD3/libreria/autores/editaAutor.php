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
                //2.Comprobamos si el formulario de ha enviado por POST
                if(!empty($_POST)){
                    //3.Cogemos los datos del formulario
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $nacionalidad = $_POST['nacionalidad'];
                }
                //4.Llamamos a la función
                $autores = actualizarAutores($id, $nombre, $nacionalidad);
            
              ?>
        </div> 
    </div>
    <?php include_once('../footer.php'); ?>
</body>
</html>
