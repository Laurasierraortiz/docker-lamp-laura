<?php include_once('head.php'); ?>

<body>
    <?php include_once('header.php'); ?>
    <?php include_once('menu.php'); ?>
    <div class="container mt-5"> 
        <!-- Tabla de libros -->
        <h2>Registro de usuarios</h2>

        <?php
        include_once('mysqli.php');

        if(!empty($_GET)){
            
            $titulo = $_GET['titulo'];
            
            include_once('utils.php');
            $guardado = registrarLibros($titulo);

            mostrarMensaje($guardado);
        }
    
        ?>
       
    </div>
    <?php include_once('footer.php'); ?>
</body>
</html>