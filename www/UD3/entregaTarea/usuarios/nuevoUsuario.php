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
                    include_once("../utils.php");
                   

                    //Comprobamos si el formulario fue enviado por el método POST
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        //Recuperamos los datos del formulario
                        $nombre = $_POST['nombre'];
                        $apellidos = $_POST['apellidos'];
                        $username = $_POST['username'];
                        $contrasena = $_POST['contrasena'];

                        //Llamamos a la función para filtrar y guardar los datos
                        $validarInfo = validarInfo($nombre, $apellidos, $username, $contrasena);

                            include_once('../pdo.php');//llamamos al archivo pdo.php para establecer la conexión 
                            // Conexión a la DB (PDO)                       
                            try {
                                $conexion = conexionPDO('tareas');
                                
                                //Introducimos los datos en la tabla
                                $insert = $conexion->prepare//preparamos la consulta
                                            //Insertamos los datos
                                            ("INSERT INTO usuarios (username, nombre, apellidos, contrasena)
                                            VALUES (:username, :nombre, :apellidos, :contrasena)");// columnaTabla :valorIntroducido
                                //Sustituimos cada parámetro por el valor introducido en el formulario
                                $insert->bindParam(':username', $username, PDO::PARAM_STR);
                                $insert->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                                $insert->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
                                $insert->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                                //bindParam: método que asocia un valor a un parámetro, en este caso a los que recuperamos del formulario
                                //PDO::PARA_STR: indica como va a ser el valor introducido, en este caso, un String
                                $insert->execute();//ejecutamos la consulta
                                echo "<div class='alert alert-success'>Datos introducidos correctamente</div>";
                            }
                            catch(PDOException $e){
                                echo "<div class='alert alert-danger'>Error al introducir los datos $e->getMessage()</div>";
                            }
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