
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
    include("header.php");//enlace a header.php
?>
    <div class="container-fluid">
        <div class="row">
        <?php
            include("menu.php");//enlace a menu.php
        ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Presentación</h2>
                </div>
            <div class="table">
            <table class="table table-striped table-hover">
            <thead class="thead">
                <tr>                            
                    <th>Identificador</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                </tr>
            </thead>


            <tbody>
            <?php
            include_once("utils.php");//enlace a utils.php

            //definimos el bucle para que se muestren las tareas en la tabla creada
            $listaTareas = mostrarTareas();
            foreach($listaTareas as $tarea){
            
                echo '<tr>';
                    echo  '<td>' . $tarea["Identificador"] . '</td>';
                    echo  '<td>' . $tarea["Descripcion"] . '</td>';
                    echo  '<td>' . $tarea["Estado"] . '</td>';
                echo '</tr>';
 
            }
                
            ?>
            </tbody>
        </table>
        </div>
            </main>
        </div>
    </div>
    
    <?php
        include("footer.php");//enlace a footer.php
    ?>
</body>
</html>