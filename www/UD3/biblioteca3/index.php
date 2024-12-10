<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
    //Cabecera
    include_once('header.php');
?>

<body>

<?php
    include_once('menu.php');
?>
    <div class="container mt-5">
        <!-- Título -->
        <h1 class="text-center mb-4">Biblioteca</h1>

        <!-- Tabla de usuarios -->
        
        <h2>Usuarios</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Localidad</th>
                </tr>
            </thead>

           
            <tbody>
            <?php
                include_once('pdo.php');

                $usuarios = mostrarUsuarios();//metemos la lista de usuarios en la variable $usuarios

                foreach($usuarios as $usuario){
                    echo "<tr>";
                        echo "<td>" . $usuario['id'] . "</td>";
                        echo "<td>" . $usuario['nombre'] . "</td>";
                        echo "<td>" . $usuario['apellidos'] . "</td>";
                        echo "<td>" . $usuario['localidad'] . "</td>";
                    echo "<tr>";
                }
            ?>
            </tbody>
        </table>

        <!-- Tabla de libros -->
        <h2>Libros</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Fecha de Préstamo</th>
                    <th>Disponible</th>
                    <th>ID Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once('mysqli.php');

                    $libros = mostrarLibros();//metemos la lista de libros en la variable $libros
    
                    foreach($libros as $libro){
                        echo "<tr>";
                            echo "<td>" . $libro['id'] . "</td>";
                            echo "<td>" . $libro['titulo'] . "</td>";
                            echo "<td>" . $libro['disponible'] . "</td>";
                            echo "<td>" . $libro['id_usuario'] . "</td>";
                        echo "<tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Enlace a Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <?php
        //Pie de página
        include_once('footer.php');
    ?>
</body>
</html>