<!--USUARIO CREADO-->
<!-- 
- Validar y filtrar los campos
 -->
 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('../header.php');?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('../menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Nuevo usuario</h2>
                </div>

                <div class="container justify-content-between">
                <?php
                   //Conectamos la db
                   include_once('../pdo.php');

                   //Comprobamos si el formulario ha sido enviado por POST
                   if(!empty($_POST)){
                    $nombre = $_POST['nombre'];
                    $apellidos = $_POST['apellidos'];
                    $username = $_POST['username'];
                    $contrasena = $_POST['contrasena'];

                    $usuarios = registrarUsuarios($nombre, $apellidos, $username, $contrasena);

                   }

 
                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php');?>
    
</body>
</html>