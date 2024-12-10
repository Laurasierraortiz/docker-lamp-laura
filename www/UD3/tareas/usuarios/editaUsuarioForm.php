<?php include_once('../head.php'); ?>
<body>
    <?php include_once('../header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once('../menu.php'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Editar usuario</h2>
                </div>
                <div class="container">
                    <?php

                    //Enlazamos el archivo para seleccionar los datos a editar
                    include_once('../pdo.php');

                    //Cogemos el id de la url para saber qué usuario vamos a editar
                    $id = $_GET['id'];

                    //Llamamos a la funcion para editar los usuarios
                    $usuario = editarUsuarios($id);
                    //Extraemos los datos que vamos a editar para que aparezcan en el formulario
                    $nombre = $usuario['nombre'];
                    $apellidos = $usuario['apellidos'];
                    $username = $usuario['username'];
                    $contrasena = $usuario['contrasena'];

                    ?>
                    <form class="mb-5" action="editaUsuario.php" method="POST" name="formulario" >

                        <input type="number" name="id" value="<?php echo $usuario['id']; ?>">
                        
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Apellidos</label>
                            <input class="form-control" type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Username</label>
                            <input class="form-control" type="text" name="username" id="username" value="<?php echo $username ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Contraseña</label>
                            <input class="form-control" type="password" name="contrasena" id="contrasena" value="<?php echo $contrasena ?>" required>
                        </div>
                        
                        <input type="hidden" name="id" value="">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>  
                </div>
            </main>
        </div>
    </div>
    <?php include_once('../footer.php'); ?>
</body>
</html>