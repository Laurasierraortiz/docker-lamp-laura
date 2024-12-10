<?php include_once('head.php'); ?>

<body>
    <?php include_once('header.php'); ?>
    <?php include_once('menu.php'); ?>
    <div class="container mt-5"> 

        <!-- Tabla de libros -->
        <h2>Préstamos</h2>
        
        <?php
            include_once('pdo.php');
            include_once('mysqli.php');
            include_once('utils.php');

            if(!empty($_POST)){
                $id_usuario = $_POST['id_usuario'];
                $id_libro = $_POST['id_libro'];
            }

            $usuarios = mostrarUsuarios();
            $usuarioValido = false;

            foreach($usuarios as $usuario){
                $id = $usuario['id'];
                if($id == $id_usuario){
                    $usuarioValido = true;
                    break;
                }
            }
            
            
            if($usuarioValido){
                $resultado = prestarLibro($id_usuario, $id_libro);
                mostrarMensaje($resultado);
            }
            else{
                echo '<div class="alert alert-success" role="alert"> Usuario no registrado en la base de datos </div>'; 
            }
        ?>
    </div>
    <?php include_once('footer.php'); ?>
</body>
</html>