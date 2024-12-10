<!--BORRAR USUARIO-->
<!-- 
- Comprobar que existe y borrar el usuario y sus tareas 
- Mostrar mensaje de borrado
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('../header.php');?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('../menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2></h2>
                </div>

                <div class="container justify-content-between">
                    
                    <?php
  
                    // Conexión a la DB (PDO) 
                    include_once('../pdo.php'); 

                    //Cogemos el id de la url
                    $id_url = $_GET['id'];

                    //Llamamos a la función yle pasamos el id del usuario que hemos cogido de la url
                    $resultado = borrarUsuarios($id_url);
                    
                        
                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>