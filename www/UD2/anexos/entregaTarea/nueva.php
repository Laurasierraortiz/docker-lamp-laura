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
        include_once('header.php'); //enlace a header.php
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php 
                include_once('menu.php'); //enlace a menu.php
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Crear nueva tarea</h2>
                </div>
                <div class="container">
                    
                <?php
                    include_once("utils.php");//enlace a utils.php

                    $formulario = $_POST;

                    var_dump($formulario);//extraemos la información del formulario

                    $idForm = $_POST['id'];
                    $descripcionForm = $_POST['descripcion'];
                    $estadoForm = $_POST['estado'];


                    mostrarTareas($idForm, $descripcionForm, $estadoForm);
                ?>

                </div>
            </main>
        </div>
    </div>
    <?php 
        include_once('footer.php'); //enlace a footer.php
    ?>
</body>
</html>



