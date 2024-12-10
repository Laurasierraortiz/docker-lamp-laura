<?php include_once('../head.php');?>

<body>
<?php include_once('../header.php');?>

    <div class="container mt-5">
        
        <h1 class="text-center mb-4">Biblioteca</h1>

        <?php include_once('../menu.php');?>

        <!-- Tabla de usuarios -->
        
        <h2>Nuevo usuario</h2>
            <?php
            include_once('../pdo.php');//archivo para conectar la db y las funciones

            
            //Comprobamos si el formulario fue enviado por método POST
            if(!empty($_POST)){
                //Cogemos los datos de los inputs del formulario
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $localidad = $_POST['localidad'];
            }
            $usuarios = registroUsuarios($nombre, $apellidos, $localidad);          
            ?>
        
    </div>

    <!-- Enlace a Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <?include_once('../footer.php');?>
   
</body>
</html>