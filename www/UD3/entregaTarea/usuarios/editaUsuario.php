<!--INFORMACIÓN DEL USUARIO ACTUALIZADO-->
<!--
- Validar y filtrar y actualizar la información
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
                
                </div>

                <div class="container justify-content-between">
                    <h2>Actualizar usuario</h2>
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
                    
                </div>

                <div class="container justify-content-between">
                <?php
                    include_once("../utils.php");
                   

                    //Comprobamos si el formulario fue enviado por el método POST
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        //Recuperamos los datos del formulario
                        $nombreU = $_POST['nombre'];
                        $apellidosU = $_POST['apellidos'];
                        $usernameU = $_POST['username'];
                        $contrasenaU = $_POST['contrasena'];
                        $idU = $intval = $_POST['id'];

                        //Llamamos a la función para filtrar y guardar los datos
                        $validarInfo = validarInfo($nombreU, $apellidosU, $usernameU, $contrasenaU);

                       

                             
                            include_once('../pdo.php');//incluimos el archivo pdo.php
                            // Conexión a la DB (PDO)                    
                            try {
                                $conexion = conexionPDO('tareas');
                            
                                //Introducimos los datos en la tabla
                                $insert = $conexion->prepare (
                                                    "UPDATE usuarios set username = :username, nombre = :nombre, apellidos = :apellidos, contrasena = :contrasena where id = :id");
                                    
                                //Sustituimos cada parámetro por el valor introducido en el formulario
                                $insert->bindParam(':username', $usernameU, PDO::PARAM_STR);
                                $insert->bindParam(':nombre', $nombreU, PDO::PARAM_STR);
                                $insert->bindParam(':apellidos', $apellidosU, PDO::PARAM_STR);
                                $insert->bindParam(':contrasena', $contrasenaU, PDO::PARAM_STR);
                                $insert->bindParam(':id', $idU, PDO::PARAM_INT);
                                $insert->execute();//ejecutamos la consulta
                                echo "Datos acualizados correctamente";
                            }
                            //lanzamos la excepción
                            catch(PDOException $e){
                                echo "Error al conectar a la base de datos: " . $e->getMessage();
                            }
                            //finalizamos la conexión
                            finally{
                                $conexion = null;
                            } 
 
                        } 
                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php');?>
    
</body>
</html>
               


