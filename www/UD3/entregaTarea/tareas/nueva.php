<!--INDEX-->
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
                    <h2>Nueva tarea</h2>
                </div>

                <div class="container justify-content-between">
                    <?php 

                    //Función para filtrar la información introducida
                    function filtrarInput($input){
                        $input = trim($input);//eliminar espacios en blanco
                        $input = stripslashes($input);//eliminar barras invertidas
                        $input = htmlspecialchars($input);//convertir caracteres especiales en html
                    
                        return $input;
                    }

                    //Función para comprobar si la información introducida es válida
                    function comprobarInfo($info){
                        $inputFiltrado = filtrarInput($info);
                    
                        return (empty($inputFiltrado)  || !preg_match('/^[a-zA-Z0-9\s]*$/', $info))? false : true;  
                    }//valida que la info introducida solo contenga caracteres de a-z, A-Z, 0-9 y espacios

                    //Comprobamos que todos los campos están correctos y completos
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        //Recuperamos los datos del formulario
                        $tituloT = filtrarInput($_POST['titulo']);
                        $descripcionT = filtrarInput($_POST['descripcion']);
                        $estadoT = filtrarInput($_POST['estado']);
                        $usuarioT = filtrarInput($_POST['usuario']);
                        
                    }

                    //Comprobamos que todos los campos están completos y son correctos
                    if(comprobarInfo($tituloT) && comprobarInfo($descripcionT) && comprobarInfo($estadoT) && comprobarInfo($usuario)){
                        
                        try {
                            ///Conexión a la DB (mysqli)
                            $conexion = new mysqli('db', 'root', 'test', 'tareas');
                            //Insertamos los datos en la tabla
                            $sql = "INSERT INTO tareas (titulo, descripcion, estado) VALUES (?, ?, ?, ?)";
                            $insert = $conexion->prepare($sql);
                            $insert->bind_param("ssss", $tituloT, $descripcionT, $estadoT, $usuarioT);
                            $insert->execute();

                            echo "<div class='alert alert-success'>Tarea creada correctamente.</div>";

                            $insert->close();
                            $conexion->close();
                        }
                        catch(mysqli_sql_exception $e){
                            echo "Error al guardar la tarea" . $e->getMessage();
                        }
                    }
                    ?>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('../footer.php'); ?>
    
</body>
</html>