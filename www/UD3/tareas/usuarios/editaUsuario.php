<?php include_once('../head.php'); ?>
<body>
    <?php include_once('../header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once('../menu.php'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Gestión de tarea</h2>
                </div>
                <div class="container">
                <?php

                
                //1.Enlazamos el archivo de la conexión
                include_once('../pdo.php');
                

                //2.Comprobamos si el formulario de ha enviado por POST
                if(!empty($_POST)){
                    //3.Cogemos los datos del formulario
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $apellidos = $_POST['apellidos'];
                    $username = $_POST['username'];
                    $contrasena = $_POST['contrasena'];

                    //4.Llamamos a la función
                    actualizarUsuarios($id, $nombre, $apellidos, $username, $contrasena);

                   }

                
                ?>
                </div>
            </main>
        </div>
    </div>
    <?php include_once('../footer.php'); ?>
</body>
</html>