<!-- LISTA DE USUARIOS CREADOS -->
 <!--
- Mostrar lista de usuarios
- Botón editar (editaUsuario.php)
- Botón borrar (borraUsuario.php)-->


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
                    <h2>Inicio</h2>
                </div>
            

                <div class="container justify-content-between">
                
                    <div class="table">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                            <?php
                                
                                include_once('../pdo.php');//incluimos el archivo pho.php para establecer conexión a la DB
                                
                                
                                try {
                                    $conexion = conexionPDO('tareas');//conectamos a la DB(PDO)
                                    $consulta = $conexion->prepare(//preparamos la consulta
                                                    "SELECT id, username, nombre, apellidos, contrasena FROM usuarios");
                                    $consulta->execute();//ejecutamos la consulta
                                    $usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
                                    //fetchAll: obtiene los datos de la consulta en una sola vez
                                    //POD::FETCH_ASSOC: especifica el formato en que se devuelven los datos, en este caso en un array asociativo
                                    
                                    //Comprobamos si el array '$usuarios' contiene algún elemento
                                    if (count($usuarios) > 0) {//si contiene elementos creamos la tabla
                                        foreach ($usuarios as $usuario) {
                                            echo "<tr>";
                                            echo "<td>" . $usuario['id'] . "</td>";
                                            echo "<td>" . $usuario['username'] . "</td>";
                                            echo "<td>" . $usuario['nombre'] . "</td>";
                                            echo "<td>" . $usuario['apellidos'] . "</td>";
                                            echo "<td>
                                                <a href='editaUsuarioForm.php?id=" . $usuario['id'] . "' class='btn btn-warning btn-sm'>Editar</a>
                                                <a href='borraUsuario.php?id=" . $usuario['id'] . "' class='btn btn-danger btn-sm'>Borrar</a>
                                                </td>
                                            </tr>";
                                        }
                                    } 
                                    else {//si no hay usuarios mostramos un mensaje
                                        echo "<div class='alert alert-success'>No hay usuarios registrados</div>";
                                    }
                                } 
                                //capturamos la excepción
                                catch (mysqli_sql_exception $e) {
                                    echo "<div class='alert alert-danger'>Error al introducir los datos</div>";
                                }
                                //finalizamos la conexión
                                finally {
                                    $conexion = null;
                                }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- <button type="submit" class="btn btn-success">Editar</button>
                <button type="submit" class="btn btn-success">Borrar</button> -->
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>