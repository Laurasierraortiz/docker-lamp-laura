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

                   
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        //Recuperamos los datos del formulario
                        $nombre = $_POST['nombre'];
                        $apellidos = $_POST['apellidos'];
                        $username = $_POST['username'];
                        $contrasena = $_POST['contrasena'];
                        $id = $_POST['id'];
                    
                         //Llamamos a la función para filtrar y guardar los datos
                         $validarInfo = validarInfo($nombre, $apellidos, $username, $contrasena);

                        include_once('../pdo.php');//incluimos el archivo pdo.php
                        // Conexión a la DB (PDO)                    
                        try {
                            $conexion = conexionPDO('tareas');
                        
                            //Introducimos los datos en la tabla
                            $insert = $conexion->prepare (
                                                "UPDATE usuarios SET username = :username, nombre = :nombre, apellidos = :apellidos, contrasena = :contrasena WHERE id = :id");
                                
                            //Sustituimos cada parámetro por el valor introducido en el formulario
                            $insert->bindParam(':username', $username, PDO::PARAM_STR);
                            $insert->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                            $insert->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
                            $insert->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                            $insert->bindParam(':id', $id, PDO::PARAM_INT);
                            $insert->execute();//ejecutamos la consulta
                            echo "<div class='alert alert-success'>Datos acualizados correctamente.</div>";
                            
                        }
                        //lanzamos la excepción
                        catch(PDOException $e){
                            echo "<div class='alert alert-success'>Error al conectar a la base de datos: " . $e->getMessage() . "</div>";
                            
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
               


