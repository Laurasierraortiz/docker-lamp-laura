<?php include_once('head.php'); ?>

<body>
    <?php include_once('header.php'); ?>
    <?php include_once('menu.php'); ?>
    <div class="container mt-5"> 
        <!-- Tabla de libros -->
        <h2>Registro de usuarios</h2>

        <?php
        include_once('pdo.php');

        if(!empty($_POST)){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $localidad = $_POST['localidad'];

            $guardado = registrarUsuario($nombre, $apellidos, $localidad);

            include_once('utils.php');

            mostrarMensaje($guardado);
            
        }
        ?>
       
    </div>
    <?php include_once('footer.php'); ?>
</body>
</html>