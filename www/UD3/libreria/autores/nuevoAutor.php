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
        <?php

        //1.Enlazamos el archivo de las funciones
        include_once('../pdo.php');
        //2.Comprobamos si el formulario se ha enviado por POST
        if(!empty($_POST)){
            //3.Cogemos los valores introducidos en el formulario
            $nombre = $_POST['nombre'];
            $nacionalidad = $_POST['nacionalidad'];
        }
        //4.Llamamos a la función para registrar el autor
        $autores = registrarAutores($nombre, $nacionalidad);

        ?>
    </div>
    <?php include_once('../footer.php'); ?>
</body>
</html>
