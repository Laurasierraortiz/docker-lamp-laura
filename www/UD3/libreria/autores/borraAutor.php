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
        //1.Enlazamos las funciones
        include_once('../pdo.php'); 
        //2.Cogemos el id del usuario a borrar a través de la url
        $id = $_GET['id'];
        //3.Llamamos a la función para borrar el autor
        $autor = borrarAutores($id);
        ?>
         
        </div>  
    </div>
    <?php include_once('../footer.php'); ?>
</body>
</html>
