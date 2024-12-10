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
        
        <!-- Tabla de Libros Registrados -->
        <h2 class="mt-5">Libros Registrados</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nacionalidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //1.Enlazamos las funciones
                include_once('../pdo.php');

                //2.Llamamos a la función para mostar la lista
                $autores = mostrarAutores();

                //3.Comprobamos si las filas de autores es mayor que 0
                if(count($autores) > 0){
                    //4.Recorremos el array
                    foreach($autores as $autor){
                        echo "<tr>";
                            echo "<td>" . $autor['id'] . "</td>";
                            echo "<td>" . $autor['nombre'] . "</td>";
                            echo "<td>" . $autor['nacionalidad'] . "</td>";
                            echo "<td>   <a href='editaAutorForm.php?id=" . $autor['id'] . "' class='btn btn-warning btn-sm'>Editar</a>
                                         <a href='borraAutor.php?id=" . $autor['id'] . "' class='btn btn-danger btn-sm'>Borrar</a>
                                  </td>";
                        echo "</tr>";
                    }   
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include_once('../footer.php'); ?>
</body>
</html>
