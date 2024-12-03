<!--FORMULARIO PARA EDITAR UN  USUARIO-->

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
            </div>

                <div class="container justify-content-between">
                <?php

                    //Para seleccionar el id del usuario tenemos que cogerla  a través de la URL
                    $id_url = $_GET['id'];

                    include_once('../pdo.php');//incluimos el archivo PDO para conectar a la DB

                    //Conexión a la DB
                    try {
                        $conexion = conexionPDO('tareas');
                        $consulta = $conexion->prepare(
                                                "SELECT id, username, nombre, apellidos, contrasena FROM usuarios WHERE id = :id");
                        $consulta->bindParam(':id', $id_url, PDO::PARAM_INT);
                        //bindParam: método que asocia un valor a un parámetro, en este caso a los que recuperamos del formulario
                        //PDO::PARAm_INT: indica como va a ser el valor introducido, en este caso, un Int
                        $consulta->execute();//ejecutamos la consulta
                        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
                        //fetch: obtiene una fila de la tabla, en este caso el id
                        //POD::FETCH_ASSOC: especifica el formato en que se devuelven los datos, en este caso en un array asociativo
                            
                    } 
                    //capturamos la excepción
                    catch (PDOException $e) {
                        echo "Error al conectar a la base de datos: " . $e->getMessage();
                    } 
                    //finalizamos la conexión
                    finally {
                        $conexion = null;
                    }
                ?>
                

                <form action="editaUsuario.php" method="POST" class="mb-2 w-50" name="formUsuario">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"  value="<?php echo $usuario['username'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo $usuario['contrasena'];?>" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-success" value="Enviar">Enviar</button>
                </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>