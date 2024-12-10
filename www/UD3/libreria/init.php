<!DOCTYPE html>
<html lang="es">
<?php include_once('head.php'); ?>
<body>
    <?php 
    include_once('header.php'); 
    include_once('menu.php'); 
    ?>

    <div class="container mt-4">
        <div class="row">
        <?php
        //1.Enlazamos al archivo de las funciones
        include_once('pdo.php');

        //CREAR DB
        function crearDB(){
            try {
                //2.Conectamos a la DB(sin el nombre de la db)
                $conexion = conexionDBPDO();
                //3.Preparamos la consulta
                $consulta = 'CREATE DATABASE libreria';
                //4.Ejecutamos la consulta
                $conexion->exec($consulta);
                echo '<div class="alert alert-success" role="alert">Base de datos creada</div>';
            }
            catch(PDOException $e) {
                echo '<div class="alert alert-danger" role="alert">La base de datos ya existe' . $e->getMessage() . '</div>';
            }
            finally {
                desconexionPDO($conexion);
            }
        }
       
        //TABLA AUTORES
        function tablaAutores(){
            try {
                //1.Conectamos a la DB(con el nombre de la db)
                $conexion = conexionPDO();
                //2.Preparamos la consulta
                $consulta = 'CREATE TABLE IF NOT EXISTS autores(
                    id INT AUTO_INCREMENT PRIMARY KEY, 
                    nombre VARCHAR(100) NOT NULL,
                    nacionalidad VARCHAR(100) NOT NULL 
                     )';
                //3.Ejecutamos la consulta
                $conexion->exec($consulta);
                echo 'Tabla creada correctamente <br>';
            }
            catch(PDOException $e) {
                echo '<div class="alert alert-danger" role="alert">Error al crear la tabla' . $e->getMessage() . '</div>';
            }
            finally {
                desconexionPDO($conexion);
            }
        }
        
        //TABLA LIBROS
        function tablaLibros(){
            try {
                //1.Conectamos a la DB(con el nombre de la db)
                $conexion = conexionPDO();
                //2.Preparamos la consulta
                $consulta = 'CREATE TABLE IF NOT EXISTS libros(
                    id INT AUTO_INCREMENT PRIMARY KEY, 
                    titulo VARCHAR(100) NOT NULL,
                    editorial VARCHAR(100) NOT NULL, 
                    id_autor INT NOT NULL, 
                    FOREIGN KEY (id_autor) REFERENCES autores(id) ON DELETE CASCADE
                )';
                //3.Ejecutamos la consulta
                $conexion->exec($consulta);
                echo 'Tabla creada correctamente <br>';
            }
            catch(PDOException $e) {
                echo '<div class="alert alert-danger" role="alert">Error al crear la tabla' . $e->getMessage() . '</div>';
            }
            finally {
                desconexionPDO($conexion);
            }
        }      
        //Llamamos a las funciones 
        crearDB();
        tablaAutores();
        tablaLibros();
       
        ?> 
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>
</html>
